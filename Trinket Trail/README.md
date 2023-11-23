# Trinket Trail ecommerce site

## Overview
Ecommerce site for an end of year project, built using PHP, a MySQL database and HTML/CSS. 

Utilizing an MVC architecture:

    Model
        The Model deals with all the data and information. It talks to the database, gets the data we need, updates it, or adds new data. For example, when someone adds a listing on the site, the Model knows how to save that listing in the database.

    View
        The View is what the users see and interact with. The View takes care of the website's layout, design, and how things are displayed. It's all about the visual stuff. When someone visits, the View shows them the listings, shopping cart, user details, etc.
        
    Controller
        The Controller takes requests from users, tells the Model what to do, and then decides how to present the data back in the View. For example, if a user wants to see a listing, they ask the Controller. The Controller then asks the Model for the listing data and tells the View to display it nicely.

In PHP, we use MVC to separate these different parts of a website. This way, code is more organized, easier to manage, and if we want to change one part, it doesn't mess up the others. For example, if we want to change how the website looks (View), you don't need to touch the data-handling code (Model). It's like in a restaurant changing the layout of the dining area, without needing to change how the kitchen works.

## Installation
- Clone the repository: `git clone https://github.com/Witteria/Trinket-Trail`
- Install dependencies: `composer install`
- Configure the `.env` file with your environment variables like this: 

    DB_HOST=localhost
    DB_NAME=trinket_trail
    DB_USER=username
    DB_PASS=password
    PRODENV=false

- Create the database if it doesn't exist yet by running the SQL file under /sql

### Requirements
- PHP >=8.1
- MySQL >=8.0
- Apache