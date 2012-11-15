$ ->
  $searchBox = $('#search-box')
  $searchContainer = $('#search-container', $searchBox)
  $('#toggle-search', $searchBox).on "click", (e) ->
    $searchContainer.slideToggle("fast")
    $('input[type=text]', $searchContainer).focus()
    false