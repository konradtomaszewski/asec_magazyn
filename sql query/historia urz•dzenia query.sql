SELECT 
products.name as 'Nazwa urz¹dzenia',
arrival_items.quantity as 'Iloœæ',
arrivals.document_name as 'Nazwa dokumentu',
arrival_types.name as 'Typ dokumentu'
FROM arrival_items 
left join arrivals ON arrivals.id=arrival_items.arrival_id
left join products ON products.id=arrival_items.product_id
left join arrival_types ON arrival_types.id=arrival_items.arrival_type_id
WHERE product_id = '27'