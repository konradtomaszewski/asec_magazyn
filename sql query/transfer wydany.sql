SELECT users.user_name, products.name, SUM(arrival_items.quantity)   FROM arrival_items 
LEFT JOIN arrivals ON arrivals.id=arrival_items.arrival_id
LEFT JOIN products ON products.id=arrival_items.product_id
LEFT JOIN users ON users.id=arrivals.release_user_id
WHERE arrival_items.arrival_type_id = '2' and arrivals.create_date BETWEEN '2019-07-02 19:00:00' AND '2019-07-02 23:59:59'
group by users.user_name,products.name, arrival_items.quantity