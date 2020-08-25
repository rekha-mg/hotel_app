<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
	<title></title>

	<script type="text/javascript">
		
		function createCard(cardData) {
  var cardTemplate = [
    '<div class="card">',
    '<p>My name is: ',
    cardData.Name || 'No name provided',
    '</p>',
    '<p>My job is: ',
    cardData.Job || 'No job provided',
    '</p></div>'
  ];

  // a jQuery node
  return $(cardTemplate.join(''));
}

var data = [
    { "Name": "Peter", "Job": "Programmer" },
    { "Name": "John", "Job": "Programmer" },
    { "Name": "Kevin", "Job": "Scientist" },
];

var cards = $();
// Store all the card nodes
data.forEach(function(item, i) {
  cards = cards.add(createCard(item));
});

// Add them to the page... for instance the <body>
function addcards() {
  $('body').append(cards);
}
	</script>
</head>
<body>

<?php
                        echo Form::button('Add Cards', ['onClick' => 'addcards()']);
                      ?>

</body>
</html>