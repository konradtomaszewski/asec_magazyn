/*pobrane urządzenia sortowane i grupowane po serwisancie */
SELECT 
					users.user_name as 'user_name',
					service_request.id as 'service_request_id',
					service_request.arrival_id as 'arrival_id',
					SUM(service_request.quantity) as 'quantity',
					service_request.sn as 'sn',
					products.name as 'product_name',
					products.id as 'product_id',
					MAX(service_request.service_status_id) as 'service_status_id'
					FROM service_request 
					LEFT JOIN products ON products.id=service_request.product_id
					LEFT JOIN users ON users.id=service_request.release_user_id
					WHERE service_request.storage_id='2' AND service_request.service_status_id in (1,2,3)  GROUP BY service_request.product_id,users.user_name order by users.user_name



/*pobrane urządzenia sortowane i grupowane po urządzeniu */				
SELECT 

					products.name as 'product_name',
					SUM(service_request.quantity) as 'quantity',
					products.id as 'product_id',
					MAX(service_request.service_status_id) as 'service_status_id'
					FROM service_request 
					LEFT JOIN products ON products.id=service_request.product_id
					WHERE service_request.storage_id='2' AND service_request.service_status_id in (1,2,3)
					AND service_request.arrival_id NOT IN (SELECT id FROM arrivals WHERE arrival_type_id='8')
					GROUP BY products.name order by products.name
					
					
					
/*nowe zapytanie działające*/
SELECT 
					users.user_name as 'serwisant',
					service_request.release_user_id,
					SUM(service_request.quantity) as 'quantity',
					products.name as 'product_name',
					products.id as 'product_id'
					FROM service_request 
					LEFT JOIN products ON products.id=service_request.product_id
					LEFT JOIN users ON users.id=service_request.release_user_id
					WHERE service_request.storage_id='1' AND 
                    release_user_id IN (SELECT id FROM users WHERE user_group_id='3' and storage_id='1') AND 
                    service_request.service_status_id in (1,2,3,5) 
					GROUP BY service_request.product_id,service_request.release_user_id		
					HAVING SUM(service_request.quantity)>0
					order by users.user_name,products.name ASC