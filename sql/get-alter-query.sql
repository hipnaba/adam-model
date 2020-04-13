set group_concat_max_len = 20480;
set @table_name = "item";
set @change = "bigint unsigned";
select distinct table_name,
       column_name,
       constraint_name,
       referenced_table_name,
       referenced_column_name,
       CONCAT(
           GROUP_CONCAT('ALTER TABLE ',table_name,' DROP FOREIGN KEY ',constraint_name SEPARATOR ';'),
           ';',
           GROUP_CONCAT('ALTER TABLE `',table_name,'` CHANGE `',column_name,'` `',column_name,'` ',@change SEPARATOR ';'),
           ';',
           CONCAT('ALTER TABLE `',@table_name,'` CHANGE `',referenced_column_name,'` `',referenced_column_name,'` ',@change),
           ';',
           GROUP_CONCAT('ALTER TABLE `',table_name,'` ADD CONSTRAINT `',constraint_name,'` FOREIGN KEY(',column_name,') REFERENCES ',referenced_table_name,'(',referenced_column_name,')' SEPARATOR ';')
       ) as query
from   INFORMATION_SCHEMA.key_column_usage
where  referenced_table_name is not null
   and referenced_column_name is not null
   and referenced_table_name = @table_name
group by referenced_table_name
