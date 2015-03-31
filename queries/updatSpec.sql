drop procedure updateSpec;
DELIMITER $$
create procedure updateSpec(in specWaardeId int, in specId int, in specOptie varchar(50), in eenheidid int)
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

  if specTypeId = 1 then
    if specoptionid > 0 then
      update specificatiewaarde
      set
        specificatieoptieid = specoptionid
      where
        specificatiewaardeid = specWaardeId;
    else
      insert into specificatieoptie (specificatieid, specificatieoptie)
      values (specId, specOptie);

      update specificatiewaarde
      set
        specificatieoptieid = LAST_INSERT_ID()
      where
        specificatiewaardeid = specWaardeId;
    end if;
  end if;
end$$

DELIMITER ;