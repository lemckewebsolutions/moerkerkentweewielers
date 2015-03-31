drop trigger AU_FIETSEN;

DELIMITER $$
create trigger AU_FIETSEN after update on fietsen
for each row
begin
  declare category varchar(50);
  declare uitvoering varchar(50);
  
  select
    c.categorietype,
	fr.frametype
  into
    category,
	uitvoering
  from
    fietsen f
    inner join categorie c on c.categorieid = f.categorieid
	inner join frame fr on fr.frameid = f.frameid
  where
    f.ID = new.ID;

  call syncSpec(1, NEW.ID, category, -1);
  call syncSpec(2, NEW.ID, uitvoering, -1);
  call syncSpec(12, NEW.ID, NEW.merk, -1);
end$$

DELIMITER ;