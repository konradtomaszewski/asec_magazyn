SELECT 
						storage.name as 'storage_name',
						broken_product_details.product_id as 'product_id',
						broken_product_details.arrival_id as 'arrival_id',
						broken_product_details.storage_id as 'storage_id',
						count(broken_product_details.id) as 'quantity', 
						products.name as 'product_name', 
						products.automat_type as 'automat_type',
						broken_product_details.sn as 'broken_product_sn', 
						mennica_services.name as 'mennica_service_name'
						FROM broken_product_details 
						left join products ON products.id=broken_product_details.product_id 
						left join mennica_services ON mennica_services.id=broken_product_details.mennica_service_id
						left join storage ON storage.id=broken_product_details.storage_id
						WHERE broken_product_details.arrival_id IN (SELECT id FROM arrivals WHERE arrival_type_id IN (5,6))
                        AND broken_product_details.storage_id='1'
						group by broken_product_details.product_id, broken_product_details.sn
						order by products.name ASC