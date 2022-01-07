SELECT products.name, service_status.name, service_request.automat_number, arrivals.document_name, service_request.change_status_datetime, u1.user_name as 'od', u2.user_name as 'do'
FROM  service_request
LEFT JOIN products ON products.id = service_request.product_id
LEFT JOIN service_status ON service_status.id = service_request.service_status_id
LEFT JOIN arrivals ON arrivals.id=service_request.arrival_id
LEFT JOIN users u1 ON u1.id=arrivals.create_user_id
LEFT JOIN users u2 ON u2.id=arrivals.release_user_id
WHERE  service_request.release_user_id ='25'
AND change_status_datetime BETWEEN  '2017-02-20 00:00:00' AND  '2017-02-20 23:59:59'
ORDER BY service_request.change_status_datetime ASC