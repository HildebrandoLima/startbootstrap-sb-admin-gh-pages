<?php

	Route::set('Index', function() {
		Index::CreateView('Index');
	});

	Route::set('Sobre', function() {
		Sobre::CreateView('Sobre');
	});

	Route::set('Contato', function() {
		Contato::CreateView('Contato');
	});

	Route::set('Registrar', function() {
		Registrar::CreateView('Registrar');
	});

	Route::set('Tables', function() {
		Tables::CreateView('Tables');
	});

	Route::set('Login', function() {
		Login::CreateView('Login');
	});

	Route::set('EsqueceuSenha', function() {
		EsqueceuSenha::CreateView('EsqueceuSenha');
	});

	Route::set('Charts', function() {
		Charts::CreateView('Charts');
	});

	Route::set('Blank', function() {
		Blank::CreateView('Blank');
	});

	Route::set('Error404', function() {
		Error404::CreateView('Error404');
	});
