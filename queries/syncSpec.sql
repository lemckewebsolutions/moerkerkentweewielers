drop procedure syncSpec;
DELIMITER $$
create procedure syncSpec(in specId int, in bikeId int, in specOptie varchar(50), in eenheidid int)
begin
  declare specWaardeId int;

  select
    specificatiewaardeid
  into
    specWaardeId
  from
    specificatiewaarde
  where
    fietsid = bikeId and
    specificatieid = specId;

  if specWaardeId > 0 then
    call updateSpec(specWaardeId, specId, specOptie, eenheidid);
  else
    call insertSpec(specId, bikeId, specOptie, eenheidid);
  end if;
end$$

DELIMITER ;