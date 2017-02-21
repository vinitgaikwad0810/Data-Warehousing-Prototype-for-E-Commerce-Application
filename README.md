# Data-Warehousing-Prototype-for-E-Commerce-Application

We have made an attempt to develope an application that could answer queries like these.

How many orders were made by a Mastercard from a particular customer quartarly?
How many orders were made by a Mastercard from a particular customer monthly?
How many defects were registered for a specific product sold in a particulat location yearly?
How many products were added to a particular store monthly?
How many shippings were made for a product in a particular year?


The project was developed as part of my CMPE 226 Database Systems graduate class. The objective was to demonstrate design skills for your Operational Database as well as Data Warehouse. 

The project uses HTML5,CSS3 and jQuery for the front end and PHP for the backend development. It uses Amazon RDS for the MySQL instances and EC2 instances for the star schema deployment.

Here is a live image of the product catalog.

![alt tag](https://github.com/vinitgaikwad0810/Data-Warehousing-Prototype-for-E-Commerce-Application/blob/master/media/productCatalog.png)

We had a end-to-end flow from registering a product to paying for the product. Moreover, there are screen to manage defects as well. Here is the relational schema. 


![alt tag](https://github.com/vinitgaikwad0810/Data-Warehousing-Prototype-for-E-Commerce-Application/blob/master/images/codeBlooded_relationalSchema.png)

We have also deployed following star schema to run anaytical queries.

![alt tag](https://github.com/vinitgaikwad0810/Data-Warehousing-Prototype-for-E-Commerce-Application/blob/master/images/codeblooded_starSchema.png)