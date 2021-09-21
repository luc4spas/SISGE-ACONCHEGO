<?php


Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/financeiro/financeiro', 'HomeController@financeiro')->name('financeiro');

Auth::routes();

//Rotas uUsuarios
Route::get('profile', 'UserController@profile');
Route::post('profile', 'UserController@update_avatar');


//Rotas de Alunos
Route::get('/aluno', 'AlunoController@show')->name('aluno');
Route::get('/aluno/creat', 'AlunoController@create')->name('aluno.creat');
Route::get('/aluno/edit/{id}', 'AlunoController@edit')->name('aluno.edit');
Route::post('/aluno/edit/{id}', 'AlunoController@update')->name('aluno.update');
Route::post('/aluno/creat', 'AlunoController@store')->name('aluno.store');
Route::post('/aluno', 'AlunoController@search')->name('aluno.search');
Route::get('/aluno/ficha/{id}', 'AlunoController@ficha')->name('aluno.ficha');
Route::get('/aluno/registro/{id}', 'AlunoController@registro')->name('aluno.registro');


//rotas ficha de anamnese
Route::get('/aluno/anamnese', 'AnamneseController@index')->name('anamnese');

//rotas de relatórios
Route::get('/relatorio/alunos', 'AlunoController@relatorio')->name('alunos');


Route::get('/aniver/aniv', 'AniverController@index')->name('aniv');
Route::post('/aniver/filtro', 'AniverController@filtro')->name('aniv.filtro');
Route::get('/aniver/aluno', 'AniverController@printAluno')->name('printAluno');
Route::get('/aniver/pais', 'AniverController@printPais')->name('printPais');
Route::get('/aniver/colab', 'AniverController@printColab')->name('printColab');
Route::get('/aniver/mae', 'AniverController@printMae')->name('printMae');



//Rotas de Fuções
Route::get('/conf/funcao', 'FuncaoController@show')->name('funcao');
Route::get('/conf/funcao/create', 'FuncaoController@create')->name('funcao.creat');
Route::post('/conf/funcao/create', 'FuncaoController@store')->name('funcao.store');
Route::get('/conf/funcao/edit/{id}', 'FuncaoController@edit')->name('funcao.edit');
Route::post('/conf/funcao/edit/{id}', 'FuncaoController@update')->name('funcao.update');



//Rotas de Turmas
Route::get('/turma', 'TurmaController@index')->name('turma');
Route::get('/turma/create', 'TurmaController@create')->name('turma.create');
Route::post('/turma/create', 'TurmaController@store')->name('turma.store');
Route::get('/turma/edit/{id}', 'TurmaController@edit')->name('turma.edit');
Route::post('/turma/{id}', 'TurmaController@destroy')->name('turma.destroy');
Route::post('/turma/edit/{id}', 'TurmaController@update')->name('turma.update');
Route::get('/turma/show/{id}', 'TurmaController@show')->name('turma.show');
Route::get('/turma/view/{id}', 'TurmaController@turmaAluno')->name('turma.view');
Route::get('/turma/print/{id}', 'TurmaController@printTurma')->name('turma.print');
Route::post('/turma/{id}/aluno', 'TurmaController@alunoturma')->name('addAluno');
Route::post('/turma', 'TurmaController@turmaAno')->name('turma.ano');
Route::post('/aluno/turno', 'TurmaController@alunoTurno')->name('turma.turno');
Route::post('/aluno/print', 'TurmaController@alunoPrint')->name('turma.printA');
Route::get('/turma/{id}/{aluno_id?}', 'TurmaController@destroyAluno')->name('remoAluno');


Route::get('/turmas', 'TurmaController@addAluno');
Route::get('/colabo', 'ColaboradoresController@colF');

//Rotas de Colaboradores
Route::get('/colaboradores/col', 'ColaboradoresController@create')->name('colab.create');
Route::get('/colaboradores/edit/{id}', 'ColaboradoresController@edit')->name('colab.edit');
Route::get('/colaboradores/lista', 'ColaboradoresController@show')->name('colab.show');
Route::post('/colaboradores/search', 'ColaboradoresController@search')->name('colab.search');
Route::post('/colaboradores/col', 'ColaboradoresController@store')->name('colab.store');
Route::post('/colaboradores/{id}', 'ColaboradoresController@update')->name('colab.update');

//Rotas Financeiro
//Rotas
