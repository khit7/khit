from flask import Flask, render_template, request, redirect, url_for
from twilio.rest import Client

app = Flask(__name__)

# Twilio account credentials
account_sid = 'your_account_sid'
auth_token = 'your_auth_token'
client = Client(account_sid, auth_token)

@app.route('/', methods=['GET', 'POST'])
def index():
    if request.method == 'POST':
        # Get the data from the form
        full_name = request.form['full_name']
        phone = request.form['ph']
        email = request.form['email']
        date_of_birth = request.form['dob']
        gender = request.form['gender']
        course = request.form['course']
        branch = request.form['branch']

        # Send the data to the admin via SMS
        message = client.messages.create(
            body=f'New application received from {full_name}! Phone: {phone}, Email: {email}, Date of Birth: {date_of_birth}, Gender: {gender}, Course: {course}, Branch: {branch}',
            from_='6302840783',
            to='8309957024'
        )

        # Alternatively, you can send the data to the admin via WhatsApp message
        # message = client.messages.create(
        #     body=f'New application received from {full_name}! Phone: {phone}, Email: {email}, Date of Birth: {date_of_birth}, Gender: {gender}, Course: {course}, Branch: {branch}',
        #     from_='7288817604',
        #     to='6301114021'
        # )

        # Redirect the user to a success page
        return redirect(url_for('success'))

    # Render the form template
    return render_template('index.html')

@app.route('/success')
def success():
    return 'Your application has been submitted successfully.'

if __name__ == '__main__':
    app.run(debug=True)
