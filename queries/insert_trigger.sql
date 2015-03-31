drop trigger AI_FIETSEN;

DELIMITER $$
create trigger AI_FIETSEN after insert on fietsen
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

  if category is not null then
    call insertSpec(1, NEW.ID, category, -1);
  end if;

  if uitvoering is not null then
    call insertSpec(2, NEW.ID, uitvoering, -1);
  end if;
  call insertSpec(12, NEW.ID, NEW.merk, -1);
end$$

DELIMITER ;