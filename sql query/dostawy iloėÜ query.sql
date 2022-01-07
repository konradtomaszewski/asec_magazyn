SELECT 
arrivals.id,
arrivals.document_name,
products.name,
arrival_items.product_id,
arrival_items.quantity 
FROM arrival_items
LEFT JOIN products ON products.id=arrival_items.product_id
LEFT JOIN arrivals ON arrivals.id=arrival_items.arrival_id
WHERE  arrival_items.arrival_type_id='1'
AND arrival_items.storage_id='1'
order by products.name ASC