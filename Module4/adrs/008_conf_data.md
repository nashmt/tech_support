# Configuration data
# Status: in progress
# Context:
For Module 4, I must provide configuration data for my Docker containers that will configure the application and make it start up smoothly. 

# Decision:
Using docker compose, I have created a .yaml file to help configure each of the services that make my application run. To configure the database, I have binded it a volume source so that all necessary data will be loaded into the container and then mounted it to another volume so that the data will persist.
To configure the Nginx server, I have written a configuration file under nginx/default.conf. This configuration file is still under works since I get a 403 Forbidden message when launching the container. I have not been able to figure this one out.  
# Consequences:
Using docker compose should help to easily configure my services and containers going forward. 
I still need to resolve the issue with configuring Nginx. 