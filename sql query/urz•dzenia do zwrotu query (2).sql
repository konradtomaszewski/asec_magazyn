SELECT 
service_request.id as 'service_request_id',
service_request.arrival_id as 'arrival_id',
SUM(service_request.quantity) as 'quantity',
service_request.sn as 'sn',
products.name as 'product_name',
products.id as 'product_id',
MAX(service_request.service_status_id) as 'service_status_id'
FROM service_request 
LEFT JOIN products ON products.id=service_request.product_id
WHERE service_request.storage_id='1' AND service_request.release_user_id='3' AND 				service_request.service_status_id='3' GROUP BY service_request.product_id