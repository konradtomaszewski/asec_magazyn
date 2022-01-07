set @document_name='wydanie1';
set @storage_id='1';
set @release_user_id='3';

select 
arrivals.id as 'arrival_id',
arrivals.document_name,
arrivals.create_date,
arrivals.release_date,
u.user_name as 'release user',
arrival_items.product_id,
products.name,
arrival_items.quantity,
arrival_items.storage_id
from arrival_items
left join arrivals ON arrivals.id=arrival_items.arrival_id
left join users u ON u.id=arrivals.release_user_id
left join products ON products.id=arrival_items.product_id
where 
arrival_items.arrival_type_id='2' and
arrivals.release_user_id=@release_user_id and
arrival_items.storage_id=@storage_id and
arrivals.document_name=@document_name