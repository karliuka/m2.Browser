# Magento2 Browser Info
Extension determines the capabilities of the customer's browser.

### Browser Info section
<img alt="Magento2 Browser Info" src="https://karliuka.github.io/m2/browser/info.png" style="width:100%"/>
### Customers Now Online section
<img alt="Magento2 Browser Info" src="https://karliuka.github.io/m2/browser/online.png" style="width:100%"/>
## Install with Composer as you go

1. Go to Magento2 root folder

2. Enter following commands to install module:

    ```bash
    composer require faonni/module-browser
    ```
   Wait while dependencies are updated.

3. Enter following commands to enable module:

    ```bash
	php bin/magento setup:upgrade
	php bin/magento setup:static-content:deploy

