SELECT -- to get the average of the first 5 tickets
   ROUND(AVG(price_per_ticket), 2)
FROM -- to get the full dataset for a ticket
   (SELECT 
      tickets.id, 
      tickets.ticket_name, 
      ticket_groups.id AS ticket_group_id,
      ticket_groups.ticket_group_section, 
      ticket_groups.ticket_group_quantity, 
      ticket_groups.ticket_group_wholesale,
      ROUND(ticket_groups.ticket_group_wholesale / ticket_groups.ticket_group_quantity, 2) AS price_per_ticket
   FROM 
      ticket_groups
   INNER JOIN 
      tickets 
   WHERE 
      tickets.id = ticket_groups.ticket_id AND 
      tickets.id = 1 AND -- change the id for the specific ticket (event) you are looking for
      (ticket_groups.ticket_group_section BETWEEN 301 AND 318 OR ticket_groups.ticket_group_section BETWEEN 323 AND 340) -- need to create formula to input a specific section range
   ORDER BY 
   price_per_ticket
   LIMIT 5) -- take out the limit for the full dataset
   AS t;