drop procedure insertSpec;
DELIMITER $$
create procedure insertSpec(in specId int, in fietsId int, in specOptie varchar(50), in eenheidid int)
begin
  declare specTypeId int;
  declare specoptionid int default 0;

  select
    specificatietypeid
  into
    specTypeId
  from
    specificatie
  where
    specificatieid = specId;
  
  select
    so.specificatieoptieid
  into
    specoptionid
  from
    specificatieoptie so
  where
    so.specificatieid = specId and
    lower(so.specificatieoptie) = lower(specOptie);
	
  if specoptionid > 0 then
    if specTypeId = 1 then
      insert into specificatiewaarde (specificatieid, fietsid, specificatieoptieid)
      values (specId, fietsId, specoptionid);
    end if;
  else
    if specTypeId = 1 then
      insert into specificatieoptie (specificatieid, specificatieoptie)
      values (specId, specOptie);

      SELECT
        specificatieoptieid
      INTO
        specoptionid
      FROM
        specificatieoptie
      WHERE
        specificatieid = specId AND
        specificatieoptie = specOptie;

      insert into specificatiewaarde (specificatieid, fietsid, specificatieoptieid)
      values (specId, fietsId, specoptionid);
    end if;
  end if;
end$$

DELIMITER ;