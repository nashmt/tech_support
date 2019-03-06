# ACID and BASE
# Status: accepted
# Context: 
ACID and BASE deal with databases and storage principles. ACID stands for atomicity, consistency, isolation, and durability. BASE stands for basically available, soft state, and eventual consistency. Together, they help to ensure that transactions take place more reliably.
From previous database courses, I know that data integrity can be enforced in MySQLv5.+

# Decision:
MySQL is a solid DBMS when it comes to data integrity and keeping persistent data. Since this project will only be used locally, it should certainly get the job done.

# Consequences:
Data should easily persist for the scale of this project.