# wordpress-tutorial

# Setup local Apache/PHP

Conveniently, macOS High Sierra comes with Apache and PHP 7 already installed, and it is easy to set up.

#### Why configure a local Apache server

WOVN's service is integrated with various customers' web services. It is therefore useful to recreate website environments with which WOVN's widget interacts. These test websites may become Projects of the made-up users of your local WOVN.io.

With a locally running Apache server you can easily create HTML files as made-up websites for this purpose.

## Create a folder for your test websites

In these examples, we will use username `david`, and create a directory at `~/Sites`. Include a `/logs` directory there. Also create a test HTML file that we can try to access.

```
$ mkdir -p /Users/david/Sites/logs
$ echo "Hello from Sites" > /Users/david/Sites/testsite.html
```

**OS X Catalina (10.15)** You want to avoid using the built-in folders in your home directory (such as `Documents`, `Downloads`, etc.) as the working directory, if you are using OS X Catalina or later. Catalina employs additional permission checks on these _special_ folders, and can cause unexplained file permission errors when using these folders (or sub-folders within them) to store the log files or the website content. Specifically, errors related to special folder permissions will be prompted as `Operation not permitted`, while regular file permission errors will be labeled as `Permission denied`.

**OS X Catalina (10.15)** If you want to bypass this restriction, you can add the relevant `httpd` binary into an exception list. To do so, open the `System Preference` app, then navigate to `Security & Privacy`, click on the `Full Disk Access` tab, then click on the lock icon at bottom left of the window. After entering your credentials to unlock the lock, click on the `+` icon on the right, below the allowed apps list. In the pop up window that appears later, press `Command`, `Shift` and `G` on your keyboard simultaneously, a `Go to the folder` popup will appear. In the text box, enter `/usr/sbin` and click `Go`. In the file selection window that appear next, select `httpd` and `httpd-wrapper`, then click `Open`. The relevant `httpd` binaries are now added to the list of special file access. You can now click on the opened lock icon to lock your changes, and then exit the `System Preference` app.

## Configure Apache

```
$ sudo vim /etc/apache2/httpd.conf
```

### Activate PHP

Uncomment the line

```
LoadModule php7_module libexec/apache2/libphp7.so
```

### Set directory from where to serve sites

Find the `DocumentRoot "..."` settings, and change the two lines as follows

```
DocumentRoot "/Users/david/Sites"
<Directory "/Users/david/Sites"
```

### Grant permissions

Apache's default user will likely be `_www`. But because we serve websites from user-owned `~/Sites` directory, that runs into permission issues. The webserver will likely run under one account only, so we can change its default user.

If you're not sure, you can check username and groups in the terminal with `$ id`

Deactivate the `User` and `Group` lines and add new ones as follows

```
#User _www
#Group _www
User david
Group staff
```

### Turn on Virtual Hosts

In order to serve various test websites from `~/Sites`, we can set up Virtual Hosts. Uncomment the line

```
Include /private/etc/apache2/extra/httpd-vhosts.conf
```

## Configure Virtual Hosts

```
$ sudo vim /etc/apache2/extra/httpd-vhosts.conf
```

Add a new domain as follows

```
Listen 80

<VirtualHost *:80>
    DocumentRoot    /Users/david/Sites
    DirectoryIndex  testsite.html
    ServerName      testsite.com
    ErrorLog        "/Users/david/Sites/logs/testsite.com-error_log"
    CustomLog       "/Users/david/Sites/logs/testsite.com-access_log" common
    <Directory /Users/david/Sites/>
      Require all granted
    </Directory>
</VirtualHost>
```

Make sure the log-Files exists
```
$ touch /Users/david/Sites/logs/testsite.com-error_log /Users/david/Sites/logs/testsite.com-access_log
```

## Configure Hosts

Add domain redirect to your test websites.

```
$ sudo vim /etc/hosts
```

Add line

```
127.0.0.1 testsite.com
```

After you start Apache, you can use `testsite.com` in the browser to access your test website `testsite.html`.

## Manage Apache

```
sudo apachectl start|stop|restart
```

### Start Apache on boot

If you want, you can do this as follows

```
sudo launchctl load -w /System/Library/LaunchDaemons/org.apache.httpd.plist
```

To stop it from automatically starting use `sudo launchctl unload ...` instead. Check whether or not it automatically launches with

```
launchctl list | grep apache
```

## Creating another test website

When you make another `new-example.html` website for testing purposes, remember to add another equivalent virtual hosts configuration entry in `/etc/apache2/extra/httpd-vhosts.conf`, and a domain redirect line in `/etc/hosts`. Also remember to restart Apache afterwards with `sudo apachectl restart`.


# Connect testsite.com with your local WOVN server

Now that your local Apache server is running, as well as your local WOVN server,
we will connect the two.

Expand your `testsite.html` with <tags> and some text, for example as follows

```
<html>
    <head>
        <title>testsite</title>
    </head>
    <body>
        <div>
            Greetings are at the top.
        </div>
        <p>
            Always include some extra text at the bottom.
        </p>
    </body>
</html>
```

Next, create a user for your local WOVN server at `http://dev-wovn.io:3000`.
You can call him Tester McTestface with email `tester@user.com`, pw `useruser`
if you want. It does not matter, as long as you remember it. 

When you are logged in, start a new project for `testsite.com`. You should be
able to see translation options for the textboxes you wrote in `testsite.html`.
Create machine translations for these, hit `PUBLISH & SAVE` button.

You will be presented with `Integration methods`. Copy the `<script>`
snippet, and add it to the `<head>` section of `testsite.html`. When you now
reload `tester.com`, it should load with the WOVN widget and translations from
your local server.
