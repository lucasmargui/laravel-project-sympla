<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">🚀 Development of a CRUD structure for future references</p>

## Resources Used
- Laravel
- JetStream
- Xampp
- Composer
- Node

# Initial environment setup

## Creating the project

The create-project command is used to create a new project from a template in Laravel.

```
composer create-project laravel/laravel laravel-project-sympla
```

## Database Connection

<details>
<summary>Click to show details about </summary>

#### Database Creation:

- Start SQL in XAMPP

- Navigate to http://localhost/phpmyadmin/ to access the database management interface

- Create a new database with the desired name.

#### Database Configuration in Laravel:

- Open the .env file in your Laravel project and locate the DB_DATABASE variable.

- Change the value of this variable to the name of the database created

#### Creating tables in the Database:

Use Artisan to create the database/migrations tables in the Database

```
php artisan migrate
```

## Installing Jetstream for Authentication

#### Installing Jetstream:

Use Composer to add Jetstream to your Laravel project:

```
composer require laravel/jetstream
```

#### Installing Livewire:

Use Artisan to install Jetstream with Livewire support:

```
php artisan jetstream:install livewire
```

#### Creating tables in the Database:

Use Artisan to create the tables generated by Jetstream in the Database

```
php artisan migrate
```

#### Installing Node.js and Resource Compilation:

Install the Node.js dependencies required for the project:

```
npm install
```

Compile the frontend resources with the command:

```
npm run dev
```

</details>

## Managing Migrations in Laravel

<details>
<summary>Click to show details about </summary>

#### Migration Structure:
- up() Method: Defines the operations to be performed when the migration is applied, such as creating a table.
- down() Method: Defines the operations to revert the changes performed by the up() method, such as deleting a table.

#### Creating Migrations:

- Command: php artisan make:migration migration_name
- Example: php artisan make:migration create_products_table
- Description: This command creates a new migration file in the database/migrations folder. Migrations are used to create and modify tables in the database.

#### Run Migrations:
- Command: php artisan migrate
- Description: Applies all pending migrations, creating or modifying tables in the database as defined in the migrations' up() methods.

#### Check Migration Status:
- Command: php artisan migrate:status
- Description: Displays the status of each migration, indicating whether it was applied or not.

#### Update Tables:
- Command: php artisan migrate:fresh
- Description: Removes all tables from the database using the down() method and recreates them using the up() method. Warning: This command will delete all tables from the database.

#### Add Fields:
- Command: php artisan make:migration add_field_to_table
- Example: php artisan make:migration add_category_to_products_table
- Description: Creates a new migration to add fields to an existing table. Use Schema::table to modify existing tables.

#### Apply Changes:
- Command: php artisan migrate
- Description: After creating a migration to add or modify fields, run this command to apply the changes.

#### Undo Changes:
- Command: php artisan migrate:rollback
- Description: Rolls back the last batch of migrations applied.
- Command: php artisan migrate:reset
- Description: Rolls back all applied migrations and re-runs them. Deletes all tables and recreates them from the migrations.

</details>

# Project Documentation

Use Artisan to start the server.

```
php artisan serve
```

## Template Inheritance

<details>
<summary>Click to show details about </summary>

Creation of a folder called layouts inside resources/views, where the main.blade.php file was added. This file serves as a base layout for the pages, containing the @yield('content') directive, which is responsible for rendering the specific content of the pages.

![image](https://github.com/user-attachments/assets/794ffe26-b45d-4ee2-b7ae-325ddef51c32)

- Displaying Errors: The @if ($errors->any()) block checks for any validation errors.

- Displaying Success Messages: The @if(session('msg')) block checks if there is a success message stored in the session.

- Rendering Dynamic Content: The @yield('content') command is used to insert the specific content of each page that extends this layout.

- x-app-layout : This is a Blade component provided by JetStream in Laravel, which implements security settings for authenticated users. To ensure that authentication works correctly during data exchange between the client and the server, it is essential to encapsulate all content intended for @yield within this component.

#### Rendering Content

![image](https://github.com/user-attachments/assets/c01059d3-1694-4958-9212-4a06395d6b54)


#### @extends('layouts.main'):

This command indicates that the current Blade file is extending a main layout called main, which is located in the layouts folder. The layout is usually a basic template that defines the common structure for multiple pages, such as the header, footer, and other sections that are reused across multiple views.

#### @section('content'):

This command defines a content section within the Blade template. The word 'content' is the name of the section. In the main layout (layouts.main), there is a @yield('content') command, which is where the content defined in this section will be inserted.


![image](https://github.com/user-attachments/assets/78f3ab9a-b831-45a2-a7b2-c1d8593821d2)


</details>

## Controller

<details>
<summary>Click to show details about </summary>

#### Creating a Controller:

To create a new controller in Laravel, use the Artisan command:

```
php artisan make:controller EventController
```
The name EventController is chosen to represent a controller that will manage actions related to events. By default, the index action inside the controller is configured to return the welcome view.

#### Using the Controller in Routes:

To use the controller in a route, first import it in the routes file:

```
use App\Http\Controllers\EventController;
```
Then, configure the route to use the specified controller action:

```
Route::get('/', [EventController::class, 'index']);
```

In this example, the '/' route is configured to call the index action of the EventController. Thus, when accessing the URL associated with the route, Laravel will direct the request to the controller's index action, which will be responsible for processing the request and returning the appropriate response.

#### Actions

- index(): Retrieves and displays all events or filters events based on a search term. Displays these events in the welcome view.

- create(): Returns the events.create view, where the user can create a new event.

- store(Request $request): Validates and stores a new event based on the form data. If there is an image, it is saved and associated with the event. The event is then saved to the database and the user is redirected to the home page with a success message.

- show($id): Displays the details of a specific event, including whether the current user is participating in the event. Returns the events.show view.

- dashboard(): Displays the user's dashboard, showing their events and events they are participating in.

- destroy($id): Deletes a specific event from the database and redirects to the dashboard with a success message.

- edit($id): Displays the events.edit view to edit a specific event, but only if the current user is the owner of the event.

- update(Request $request): Updates a specific event based on the form data. If a new image is uploaded, it replaces the old image. The event is updated in the database and the user is redirected to the dashboard with a success message.

- joinEvent($id): Adds the current user as an attendee of a specific event and redirects to the dashboard with a confirmation message.

- leaveEvent($id): Removes the current user as an attendee of a specific event and redirects to the dashboard with a success message.

</details>

## Routes

<details>
<summary>Click to show details about </summary>

![image](https://github.com/user-attachments/assets/4dedb597-6f39-4d84-85c9-fd42e3c36a14)

#### Route::get('/dashboard', ...:

- Defines an HTTP GET route for the path /dashboard. This means that when a user accesses the URL example.com/dashboard, this route will be triggered.

#### [EventController::class, 'dashboard']:

- Specifies the controller and method that should be called when the /dashboard route is accessed.

- EventController::class refers to the EventController class, and 'dashboard' is the method within that controller that will be executed to handle the request.

![image](https://github.com/user-attachments/assets/7bd6f7da-bbb7-4b6a-81de-b5415a718ac4)

Returning the view located at events/dashboard.blade.php

#### ->name('events.dashboard'):

- Gives the route a name, in this case 'events.dashboard'. This allows you to reference this route more conveniently in other parts of your code, such as when generating URLs or redirecting users.

![image](https://github.com/user-attachments/assets/3e6bbc13-17b8-4857-b9f3-b38d0304fce5)

#### Route::get('/dashboard', [EventController::class, 'dashboard'])->name('events.dashboard');

- Description: Displays the dashboard, usually used to show an overview of events or related data.
- HTTP method: GET
- Name: events.dashboard

#### Route::get('/events/create', [EventController::class, 'create'])->name('events.create');

- Description: Displays a form to create a new event.
- HTTP Method: GET
- Name: events.create

#### Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');

- Description: Displays the details of a specific event, identified by the ID provided in the URL.
- HTTP Method: GET
- Name: events.show

#### Route::get('/events/edit/{id}', [EventController::class, 'edit'])->name('events.edit');

- Description: Displays a form to edit an existing event, identified by the ID provided in the URL.
- HTTP Method: GET
- Name: events.edit

#### Route::put('/events/update/{id}', [EventController::class, 'update'])->name('events.update');

- Description: Updates the data of an existing event based on the information submitted in the form and the ID provided in the URL.
- HTTP Method: PUT
- Name: events.update

#### Route::post('/events', [EventController::class, 'store'])->name('events.store');

- Description: Stores a new event in the database based on the information submitted in the form.
- HTTP Method: POST
- Name: events.store

#### Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');

- Description: Removes an existing event from the database based on the ID provided in the URL. - HTTP Method: DELETE
- Name: events.destroy

#### Route::post('/events/join/{id}', [EventController::class, 'joinEvent'])->name('events.joinEvent');

- Description: Allows a user to subscribe to or join a specific event identified by ID.
- HTTP Method: POST
- Name: events.joinEvent

#### Route::delete('/events/leave/{id}', [EventController::class, 'leaveEvent'])->name('events.leaveEvent');

- Description: Allows a user to leave or leave a specific event identified by ID.
- HTTP Method: DELETE
- Name: events.leaveEvent

</details>

## Creating a page

<details>
<summary>Click to show details about </summary>

#### Changing the Route:

Add a new route for the dashboard in the routes file (web.php), which points to a method called dashboard in the EventController. The route name is defined as events.dashboard:

```
Route::get('/dashboard', [EventController::class, 'dashboard'])->name('events.dashboard');

```

#### Adding the Function to the Controller:

In the EventController, add a dashboard method to handle the dashboard logic and visualization:

```
public function dashboard()
{
// Logic for the dashboard
return view('events.dashboard', ['events' => $events, 'eventsasparticipant' => $eventsAsParticipant]); }
```

#### Changing Links:

Update the links in your application to use the new route named events.dashboard. This may involve updating links in your Blade components or other parts of your code:

```
<a href="{{ route('events.dashboard') }}">Dashboard</a>
```

#### Creating the Dashboard Component:

Create a Blade component called dashboard.blade.php in the resources/views/events folder to define the layout and content of the dashboard:

```
<!-- resources/views/events/dashboard.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Dashboard</h1>
<!-- Dashboard content -->
@endsection

```

</details>

## Relations one to many

<details>
<summary>Click to show details about</summary>

#### Creating the Migration:

To add a user_id column to the events table, use the Artisan command:

```
php artisan make:migration add_user_id_to_events_table
```

This command creates a migration file where you can define the necessary changes in the table.

![image](https://github.com/user-attachments/assets/c7a786cd-86c6-411a-a137-24bac851acc0)

#### Change the Event Model:

In the Event model, add a function to define the relationship with the User model. The singular user function indicates that the Event belongs to a single User, creating a foreign key relationship:

![image](https://github.com/user-attachments/assets/6d0dd7df-72d3-4dd6-8aaf-8e1c72377cb7)

#### Change to the User model:

In the User model, add a function to define the relationship with the Event model. The plural events function indicates that the User can have many Events, creating a foreign key relationship:

![image](https://github.com/user-attachments/assets/b959db41-160b-446d-a803-1be9bd628c37)

These changes establish the relationship between the Event and User models, where an event belongs to a user and a user can have many associated events.

</details>


## Relations many to many

<details>
<summary>Click to show details about </summary>

#### Creating the Relationship Table:

To establish a many-to-many relationship between Event and User, you need to create an intermediate table, for example, event_user, which will have two foreign key columns: event_id and user_id.
Run the artisan command to generate a new migration for this table.
```
php artisan make:migration create_event_user_table
```

![image](https://github.com/user-attachments/assets/7654db4b-dad9-4140-8fdb-6f464b3b4db1)

Then, apply the migration with php artisan migrate.

```
php artisan migrate
```

#### Defining the Relationship in the Models:

In the Event model, add a method to define the relationship with User. This is usually done with the belongsToMany method:

![image](https://github.com/user-attachments/assets/e59021db-22e9-42e8-a613-262a3cfce853)

In the User model, add a similar method to define the relationship with Event:

![image](https://github.com/user-attachments/assets/9067f710-f18c-406e-a11a-8078031dd60e)

#### Relationship Handling:

To associate users with events, you can implement functionality such as an RSVP button. When a user clicks the button, a record is created in the event_user table associating the user_id with the event_id.

This can be done through a route and controller that receives the request and updates the intermediate table with the appropriate IDs.
This creates a many-to-many relationship between Event and User, allowing each Event to have many Users and each User to participate in many Events.

</details>

## Pages

![image](https://github.com/user-attachments/assets/68cead34-9a1c-4ba2-84fc-0492a34d744c)

![image](https://github.com/user-attachments/assets/191c6400-aa4a-42c5-9835-3e4b01e1171d)

![image](https://github.com/user-attachments/assets/43bca8e7-aaac-4267-a7c0-1fe7a0919f2e)

![image](https://github.com/user-attachments/assets/1f5b5c86-e197-4de0-9962-3f90d5995675)

![image](https://github.com/user-attachments/assets/87e4bdd2-6409-4246-af06-2a9194402176)

![image](https://github.com/user-attachments/assets/9f23826c-9d55-4bd4-bea2-09c6a43aee3e)


