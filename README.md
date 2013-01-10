UW-PHP-course Group Project
==========

### Project Description:

This is a group project for an "Object-Oriented PHP for High-Traffic Web Sites" course.
This project demonstrates collaborative open source PHP web development focused on implementing some subset of: OOP, TDD, CI, patterns, scalability, etc...


### Usage:

<p>NOTE: The demo code really works, although it is just a test project.</p>

```php
require_once('main.php');

// construct pipeline manager object
$p = new Producer();

// go go go
$p->produceAll();

// produce specific pipeline item
$p->produce(2);

// add content to producer pipeline
$p->add2Pipeline("foo", "bar");

$p->produce("foo");
```

