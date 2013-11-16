forms
=====

required fields
---------------
add `required` and `aria-required="true"`

see: https://developer.mozilla.org/en-US/docs/Accessibility/ARIA/ARIA_Techniques/Using_the_aria-required_attribute

> HTML5 now has the required attribute, but aria-required is still useful for user agents that do not yet support HTML5.

role of comments
----------------

see: https://developer.mozilla.org/en-US/docs/Accessibility/ARIA/ARIA_Techniques/Using_the_article_role

> The ARIA article role is similar to the HTML5 article element; however the article element should still be given the ARIA role of article, since not all assistive technologies support HTML5 yet.

textboxes
---------

add `role="textbox" aria-multiline="true"`, see: https://developer.mozilla.org/en-US/docs/Accessibility/ARIA/ARIA_Techniques/Using_the_textbox_role
