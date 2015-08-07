<?php
    // These are the requirements (file paths) for Silex and the class Contact that I have created
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Contact.php";

    // This is needed to initiate my session cookie to store all my instances of my Contact class
    session_start();
    if (empty($_SESSION['list_of_contacts'])) {
        $_SESSION['list_of_contacts'] = array();
    }

    // This creates a new instance of a Silex application
    $app = new Silex\Application();

    // This registers Twig and points Twig to my views folder so it knows where to find my Twig files
    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    // This is the route for my root directory using ->get to return and display my Twig file
    // contacts.html.twig, it also includes access to Contact class
    $app->get("/", function() use ($app) {
        return $app['twig']->render('contacts.html.twig', array('contacts' => Contact::getAll()));
    });

    // This is a post route that will store a new instance of the Contact class using the information
    // entered into the form on the root page and save it into the session cookie and display back
    // the last post added to the session, the view includes a back button to return the root page
    // where all the new instances of Contact will be displayed.
    $app->post("/contacts", function() use ($app) {
        $contact = new Contact($_POST['name'], $_POST['phone'], $_POST['address']);
        $contact->save();

        return $app['twig']->render('create_contact.html.twig', array('newcontact' => $contact));
    });

    // This is a delete function added to the home page in the form of a button that will allow you to
    // clear the session cookie by setting the session array to a blank array. 
    $app->post("/delete_contacts", function() use ($app) {
        Contact::deleteAll();
        return $app['twig']->render('delete_contacts.html.twig', array('contacts' => Contact::getAll()));
    });

    return $app;
?>
