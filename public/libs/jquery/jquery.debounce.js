// Source: http://stackoverflow.com/a/4298672/2573965
;(function($) {
  // http://en.wikipedia.org/wiki/Debounce#Contact_bounce
  // Runs func after the calling event trigger completes. Useful for window resizes, etc.
  $.fn.debounce = function debouncer( func , timeout ) {
    var timeoutID , timeout = timeout || 200;
    return function () {
      var scope = this , args = arguments;
      clearTimeout( timeoutID );
      timeoutID = setTimeout( function () {
        func.apply( scope , Array.prototype.slice.call( args ) );
      } , timeout );
    }
  };
}(jQuery));
