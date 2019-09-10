# Yukky Log PHP SDk

Easy to use SDK to send log to Yukky Log !

For more informations visit https://log.yukkyapp.com/doc

## Installation

```
composer require smallprodapp/yukky-log-php-sdk
```

**That's it !**

## Initialisation

Somewhere in your code you should add this :

```
require "./vendor/autoload.php";
...
Yukky\YukkyLog.init("<appkey>", "<appsecret>");
```

This will initialize the SDK.

You can add a third parameter to specify if you want the debug mode.

## Send some logs

### The Log class

To send a Log, you need to create it first.

To do that, you can create a Log object like this :

```
new Yukky\Log("PHP Test", ["PHP", "Test"], "Test php desc", null);
```

The first parameter is the log name, the second is an array of tags, the third is a description and the last one is some infos you want to send, it must be an object.

If you want to create your own log type (not error, warning or info), you can create a FullLog object like this :

```
new Yukky\FullLog("PHP Test", ["PHP", "Test"], "Test php desc", null, "my type");
```

The parameters are the same as Log but you must add another one which is the name of your custom type.

### Error

To send an error log simply add this line :

```
Yukky\YukkyLog.error(new Log("PHP Test", ["PHP", "Test"], "Test php desc", null));
or
Yukky\YukkyLog.error(["name" => "PHP Test", "tags" => ["PHP", "Test"], "desc" => "Test php desc", "infos" => null]);
```

### Warning

To send a warning log simply add this line :

```
Yukky\YukkyLog.warning(new Log("PHP Test", ["PHP", "Test"], "Test php desc", null));
or
Yukky\YukkyLog.warning(["name" => "PHP Test", "tags" => ["PHP", "Test"], "desc" => "Test php desc", "infos" => null]);
```

### Info

To send an info log simply add this line :

```
Yukky\YukkyLog.info(new Log("PHP Test", ["PHP", "Test"], "Test php desc", null));
or
Yukky\YukkyLog.info(["name" => "PHP Test", "tags" => ["PHP", "Test"], "desc" => "Test php desc", "infos" => null]);
```

### Custom

To send a custom log simply add this line :

```
Yukky\YukkyLog.custom(new FullLog("PHP Test", ["PHP", "Test"], "Test php desc", null, "my type"));
or
Yukky\YukkyLog.custom(["name" => "PHP Test", "tags" => ["PHP", "Test"], "desc" => "Test php desc", "infos" => null, "type" => "my custom type"]);
```
