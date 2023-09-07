# Events plugin (Sample interview question)

Using ACF (pre-installed), add fields to store the start date and time.
Within the plugin: create a view to display the single event content, The structure below is fine, no styling required. Note there is also an RSVP form, you will build this next.

{{title}}
{{location title}}
{{the_content()}}
{{formatted start date}}
{{rsvp form}}
 
Create a form and insert it where you see {{rsvp form}} with the following fields using the POST method
- Full Name (Text)
- Email (Email)
- Post ID (Hidden)
Write a Wordpress hook to listen for the form submission and create a POST request to the following url with the body params below:

https://webhook.site/b0759d97-d097-4980-a057-27132831917b

{
   “eventTitle”: String,
    “eventStartDate”: Timestamp,
    “locationTitle”: String,
    “description”: String,
    “fullName”: String,
    “email”: String
}
Add some sort of success indicator to the event view after RSVPing.



## Additional questions

1. Enable submission to an email
2. Enable submission to a custom table in the wordpress database 
3. Create a reporting table for submitted data in the dashboard (extend ```WP_List_Table``` class)