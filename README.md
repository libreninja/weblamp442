UW-PHP-course Group Project
==========

### Product Description:

Group project for "Object-Oriented PHP for High-Traffic Web Sites" course.
This project demonstrates collaborative open source PHP web development focused on implementing some subset of: OOP, TDD, CI, patterns, scalability, etc...


### Usage:

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

