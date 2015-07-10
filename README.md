pyro-list-field
===============

A List field type for PyroCMS

![Screen Shot 2013-02-13 at 2 28 35 PM](https://f.cloud.github.com/assets/1425304/154199/ad9fa5f4-7613-11e2-8cdc-72507b9b28d1.png)

Features
--------

* Generates an array of items to be pushed into a list of any kind
* Has enter mapped to the submit item
* Remove items easily

Usage
-----

This plugin stores 2 things, a key(the index of the item) and the value(value of the input).
You can use has_item and a count of items.

``` html
{{ if my_field_slug:has_item }}
You have {{ my_field_slug:count }} item(s) in your cart:
<ul>
{{ my_field_slug:items }}
  <li class="item{{ key }}">{{ value }}</li>
{{ /my_field_slug:items }}
</ul>
{{ endif }}
```

If there was 3 items, this would output:

``` html
You have 3 item(s) in your cart:
<ul>
  <li class="item0">Item String Value</li>
  <li class="item1">Item String Value</li>
  <li class="item2">Item String Value</li>
</ul>
```

To Do
-----

* Switch serialization to JSON decode/encode (will be easier to make more of the todo I think)
* Add sorting/ordering
* Allow child list items
* List to string instead of just array
* Allow styling/classes/odd and even
* Allow links (url, target, title etc.)
* Allow setting of key (index or string etc.)

License
-------

(The MIT License)

Copyright (c) 2013 James Doyle <james2doyle@gmail.com>   * Some modification is 2015 Marc-André Martin @mamarmite. Don't know the legal stuff about this though.

Permission is hereby granted, free of charge, to any person obtaining
a copy of this software and associated documentation files (the
'Software'), to deal in the Software without restriction, including
without limitation the rights to use, copy, modify, merge, publish,
distribute, sublicense, and/or sell copies of the Software, and to
permit persons to whom the Software is furnished to do so, subject to
the following conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED 'AS IS', WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY
CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.