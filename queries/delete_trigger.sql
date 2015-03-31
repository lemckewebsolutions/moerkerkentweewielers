drop trigger BD_FIETSEN;

DELIMITER $$
create trigger BD_FIETSEN before delete on fietsen
for each row
begin
  delete
  FROM
    specificatiewaarde
  WHERE
    fietsid = OLD.ID;
end$$

DELIMITER ;