# D8 Cards - Day 02

This submodule attempts to complete the activity card for [Day 02](https://www.d8cards.com/sites/default/files/2016-05/Day%2002%20%C2%AD%20Paragraphs%20Module-rev05132016.pdf) of the [Drupal 8 Activity Cards](https://www.d8cards.com/). There is also a solution to the bonus exercise.

### Usage

To see this in action firstly enable this module from the Extend page. Once enabled a new Migration group becomes available. This migration contains some sample content. To run the migrations you can use drush:
````drush mi --group=day02````

The above command will import a node of type D8 Cards Article, and a linked paragraph of type Social Media. You should be able to see this node listed as 'Social' on the content listing page. Visit the node to see the paragraph pull in a tweet.