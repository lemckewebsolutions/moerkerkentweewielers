drop trigger AI_FIETSEN;

DELIMITER $$
create trigger AI_FIETSEN after insert on fietsen
for each row
begin
  declare category varchar(50);
  declare uitvoering varchar(50);
  declare model varchar(50);
  declare framemaat int;
  declare framemaateenheidid int;

  select
    c.categorietype,
    fr.frametype,
    f.model,
    fm.framemaat,
    fm.eenheid
  into
    category,
    uitvoering,
    model,
    framemaat,
    framemaateenheidid
  from
    fietsen f
    inner join categorie c on c.categorieid = f.categorieid
    inner join frame fr on fr.frameid = f.frameid
    left join framemaat fm on fm.framemaatid = f.framemaatid and fm.framemaatid > 0
  where
    f.ID = new.ID;

  if category is not null then
    call insertSpec(1, NEW.ID, category, -1);
  end if;

  if uitvoering is not null then
    call insertSpec(2, NEW.ID, uitvoering, -1);
  end if;

  if model is not null THEN
    call insertSpec(13, NEW.ID, model, -1);
  end if;

  call insertSpec(12, NEW.ID, NEW.merk, -1);

  if framemaat > 0 THEN
    call insertSpec(3, NEW.ID, framemaat, framemaateenheidid);
  end if;
end$$

DELIMITER ;