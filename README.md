## Installation

Clone this repository to your local machine with:
```bash
$ git clone https://github.com/idoqo/twilio-whatsapp-invoice
```
Next, change into the project directory:
```bash
$ cd twilio-whatsapp-invoice
```
and install the project dependencies with:
```bash
$ composer install
```
Copy the `.env.example` to `.env` with:
```bash
$ cp .env.example .env
```
Remember to update the following with your actual credentials in the `env` file.
* `STRIPE_PUB_KEY`
* `STRIPE_SECRET_KEY`
* `TWILIO_ACCOUNT_SID`
* `TWILIO_AUTH_TOKEN`
* `TWILIO_SANDBOX_NUMBER`

**Note**: If you're developing locally, the `NGROK_URL` will be gotten when you run the ngrok command later, remember to fill that in as well.

Start the application server and fire up nginx to listen on the server port.
```bash
php artisan serve
ngrok http 8000
```
Now, the application should be accessible at `http://localhost:8000`.

## Resources
- [Laravel Documentation](https://laravel.com/docs)
- [Twilio API for Whatsapp](https://www.twilio.com/whatsapp)

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
