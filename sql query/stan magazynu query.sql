SELECT arrival_items.product_id, products.automat_type, products.name, sum(arrival_items.quantity) 
FROM arrival_items 
left join products ON products.id=arrival_items.product_id 
WHERE arrival_items.storage_id='1' 
group by arrival_items.product_id