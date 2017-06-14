/*! Parser: jQuery Globalize - updated 10/26/2015 (v2.23.6) */
/* Extract localized data using jQuery's Globalize parsers; set
 Globalize.locale( 'xx' ) in the globalize settings */
/*jshint jquery:true */
/*global Globalize:false */
;( function( $ ) {
	'use strict';

	/*! jQuery Globalize date parser (https://github.com/jquery/globalize#date-module) */
	$.tablesorter.addParser({
		id: 'globalize-date',
		is: function () {
			return false;
		},
		format: function ( str, table, cell, cellIndex ) {
			var globalize, date,
				c = table.config,
				// add options to 'config.globalize' for all columns --> globalize : { skeleton: 'GyMMMd' }
				// or per column by using the column index --> globalize : { 0 : { datetime: 'medium' } }
				options = c.globalize && ( c.globalize[ cellIndex ] || c.globalize ) || {};
			if ( Globalize ) {
				globalize = typeof options.lang === 'object' ? options.lang : Globalize( options.lang || 'en' );
			}
			date = globalize && globalize.dateParser ? globalize.dateParser( options )( str ) :
				str ? new Date( str ) : str;
			return date instanceof Date && isFinite( date ) ? date.getTime() : str;
		},
		type: 'numeric'
	});

	/*! jQuery Globalize number parser (https://github.com/jquery/globalize#number-module) */
	$.tablesorter.addParser({
		id: 'globalize-number',
		is: function () {
			return false;
		},
		format: function ( str, table, cell, cellIndex ) {
			var globalize, num,
				c = table.config,
				// add options to 'config.globalize' for all columns --> globalize : { skeleton: 'GyMMMd' }
				// or per column by using the column index --> globalize : { 0 : { datetime: 'medium' } }
				options = c.globalize && ( c.globalize[ cellIndex ] || c.globalize ) || {};
			if ( Globalize ) {
				globalize = typeof options.lang === 'object' ? options.lang : Globalize( options.lang || 'en' );
			}
			num = globalize && globalize.numberParser ? globalize.numberParser( options )( str ) :
				str ? $.tablesorter.formatFloat( ( str || '' ).replace( /[^\w,. \-()]/g, '' ), table ) : str;
			return str && typeof num === 'number' ? num : str;
		},
		type: 'numeric'
	});

})( jQuery );
