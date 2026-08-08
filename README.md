# Thelia default email template

The default email template of Thelia 3, rendered with Twig.

It contains the transactional emails sent by the core and by modules: order
confirmation and notification, customer account creation and confirmation,
password reset, newsletter subscription. Each message ships in two variants,
`*.html.twig` and `*.txt.twig`.

Layouts (`default-html-layout.html.twig`, `default-text-layout.txt.twig`,
`email-layout.html.twig`) provide the common wrapper. A message template either
extends a layout with Twig blocks, or is inserted into it through the
`message_body` variable.

Translations live in `I18n/`, under the `email` domain.

## Customization

Do not edit this template in place: an update will overwrite your changes.
Copy it to `templates/email/<your-template>` and select it in the back office,
or override only the files you need to change.

## Documentation

https://doc.thelia.net

## License

GPL-3.0-or-later
