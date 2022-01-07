SELECT 
arrival_items.product_id, 
products.automat_type, 
products.name, 
sum(arrival_items.quantity),
arrivals.document_name,
users.user_name as 'wystawi³',
arrivals.create_date,
u2.user_name as 'zatwierdzi³',
arrivals.accept_date
FROM arrival_items 
left join products ON products.id=arrival_items.product_id 
left join arrivals ON arrivals.id=arrival_items.arrival_id
left join users on users.id=arrivals.create_user_id
left join users u2 on u2.id=arrivals.accept_user_id
WHERE arrival_items.storage_id='1' 
AND arrivals.document_name=''
group by arrival_items.product_id