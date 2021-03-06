
@extends('adminlte::page')

@section('title', 'SISGE | Beta')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

<section class="content">
    <div class="row">
      <div class="col-md-3">
        <div class="box box-solid">
          <div class="box-header with-border">
            <h4 class="box-title">Draggable Events</h4>
          </div>
          <div class="box-body">
            <!-- the events -->
            <div id="external-events">
              <div class="external-event bg-green ui-draggable ui-draggable-handle" style="position: relative;">Lunch</div>
              <div class="external-event bg-yellow ui-draggable ui-draggable-handle" style="position: relative;">Go home</div>
              <div class="external-event bg-aqua ui-draggable ui-draggable-handle" style="position: relative;">Do homework</div>
              <div class="external-event bg-light-blue ui-draggable ui-draggable-handle" style="position: relative;">Work on UI design</div>
              <div class="external-event bg-red ui-draggable ui-draggable-handle" style="position: relative;">Sleep tight</div>
              <div class="checkbox">
                <label for="drop-remove">
                  <input type="checkbox" id="drop-remove">
                  remove after drop
                </label>
              </div>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /. box -->
        <div class="box box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Create Event</h3>
          </div>
          <div class="box-body">
            <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
              <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
              <ul class="fc-color-picker" id="color-chooser">
                <li><a class="text-aqua" href="#"><i class="fa fa-square"></i></a></li>
                <li><a class="text-blue" href="#"><i class="fa fa-square"></i></a></li>
                <li><a class="text-light-blue" href="#"><i class="fa fa-square"></i></a></li>
                <li><a class="text-teal" href="#"><i class="fa fa-square"></i></a></li>
                <li><a class="text-yellow" href="#"><i class="fa fa-square"></i></a></li>
                <li><a class="text-orange" href="#"><i class="fa fa-square"></i></a></li>
                <li><a class="text-green" href="#"><i class="fa fa-square"></i></a></li>
                <li><a class="text-lime" href="#"><i class="fa fa-square"></i></a></li>
                <li><a class="text-red" href="#"><i class="fa fa-square"></i></a></li>
                <li><a class="text-purple" href="#"><i class="fa fa-square"></i></a></li>
                <li><a class="text-fuchsia" href="#"><i class="fa fa-square"></i></a></li>
                <li><a class="text-muted" href="#"><i class="fa fa-square"></i></a></li>
                <li><a class="text-navy" href="#"><i class="fa fa-square"></i></a></li>
              </ul>
            </div>
            <!-- /btn-group -->
            <div class="input-group">
              <input id="new-event" type="text" class="form-control" placeholder="Event Title">

              <div class="input-group-btn">
                <button id="add-new-event" type="button" class="btn btn-primary btn-flat">Add</button>
              </div>
              <!-- /btn-group -->
            </div>
            <!-- /input-group -->
          </div>
        </div>
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="box box-primary">
          <div class="box-body no-padding">
            <!-- THE CALENDAR -->
            <div id="calendar" class="fc fc-unthemed fc-ltr"><div class="fc-toolbar fc-header-toolbar"><div class="fc-left"><div class="fc-button-group"><button type="button" class="fc-prev-button fc-button fc-state-default fc-corner-left" aria-label="prev"><span class="fc-icon fc-icon-left-single-arrow"></span></button><button type="button" class="fc-next-button fc-button fc-state-default fc-corner-right" aria-label="next"><span class="fc-icon fc-icon-right-single-arrow"></span></button></div><button type="button" class="fc-today-button fc-button fc-state-default fc-corner-left fc-corner-right fc-state-disabled" disabled="">today</button></div><div class="fc-right"><div class="fc-button-group"><button type="button" class="fc-month-button fc-button fc-state-default fc-corner-left fc-state-active">month</button><button type="button" class="fc-agendaWeek-button fc-button fc-state-default">week</button><button type="button" class="fc-agendaDay-button fc-button fc-state-default fc-corner-right">day</button></div></div><div class="fc-center"><h2>September 2018</h2></div><div class="fc-clear"></div></div><div class="fc-view-container" style=""><div class="fc-view fc-month-view fc-basic-view" style=""><table class=""><thead class="fc-head"><tr><td class="fc-head-container fc-widget-header"><div class="fc-row fc-widget-header"><table class=""><thead><tr><th class="fc-day-header fc-widget-header fc-sun"><span>Sun</span></th><th class="fc-day-header fc-widget-header fc-mon"><span>Mon</span></th><th class="fc-day-header fc-widget-header fc-tue"><span>Tue</span></th><th class="fc-day-header fc-widget-header fc-wed"><span>Wed</span></th><th class="fc-day-header fc-widget-header fc-thu"><span>Thu</span></th><th class="fc-day-header fc-widget-header fc-fri"><span>Fri</span></th><th class="fc-day-header fc-widget-header fc-sat"><span>Sat</span></th></tr></thead></table></div></td></tr></thead><tbody class="fc-body"><tr><td class="fc-widget-content"><div class="fc-scroller fc-day-grid-container" style="overflow: hidden; height: 644px;"><div class="fc-day-grid fc-unselectable"><div class="fc-row fc-week fc-widget-content" style="height: 107px;"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-other-month fc-past" data-date="2018-08-26"></td><td class="fc-day fc-widget-content fc-mon fc-other-month fc-past" data-date="2018-08-27"></td><td class="fc-day fc-widget-content fc-tue fc-other-month fc-past" data-date="2018-08-28"></td><td class="fc-day fc-widget-content fc-wed fc-other-month fc-past" data-date="2018-08-29"></td><td class="fc-day fc-widget-content fc-thu fc-other-month fc-past" data-date="2018-08-30"></td><td class="fc-day fc-widget-content fc-fri fc-other-month fc-past" data-date="2018-08-31"></td><td class="fc-day fc-widget-content fc-sat fc-past" data-date="2018-09-01"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-other-month fc-past" data-date="2018-08-26"><span class="fc-day-number">26</span></td><td class="fc-day-top fc-mon fc-other-month fc-past" data-date="2018-08-27"><span class="fc-day-number">27</span></td><td class="fc-day-top fc-tue fc-other-month fc-past" data-date="2018-08-28"><span class="fc-day-number">28</span></td><td class="fc-day-top fc-wed fc-other-month fc-past" data-date="2018-08-29"><span class="fc-day-number">29</span></td><td class="fc-day-top fc-thu fc-other-month fc-past" data-date="2018-08-30"><span class="fc-day-number">30</span></td><td class="fc-day-top fc-fri fc-other-month fc-past" data-date="2018-08-31"><span class="fc-day-number">31</span></td><td class="fc-day-top fc-sat fc-past" data-date="2018-09-01"><span class="fc-day-number">1</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" style="background-color:#f56954;border-color:#f56954"><div class="fc-content"><span class="fc-time">12a</span> <span class="fc-title">All Day Event</span></div></a></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style="height: 107px;"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-past" data-date="2018-09-02"></td><td class="fc-day fc-widget-content fc-mon fc-past" data-date="2018-09-03"></td><td class="fc-day fc-widget-content fc-tue fc-past" data-date="2018-09-04"></td><td class="fc-day fc-widget-content fc-wed fc-past" data-date="2018-09-05"></td><td class="fc-day fc-widget-content fc-thu fc-past" data-date="2018-09-06"></td><td class="fc-day fc-widget-content fc-fri fc-past" data-date="2018-09-07"></td><td class="fc-day fc-widget-content fc-sat fc-past" data-date="2018-09-08"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-past" data-date="2018-09-02"><span class="fc-day-number">2</span></td><td class="fc-day-top fc-mon fc-past" data-date="2018-09-03"><span class="fc-day-number">3</span></td><td class="fc-day-top fc-tue fc-past" data-date="2018-09-04"><span class="fc-day-number">4</span></td><td class="fc-day-top fc-wed fc-past" data-date="2018-09-05"><span class="fc-day-number">5</span></td><td class="fc-day-top fc-thu fc-past" data-date="2018-09-06"><span class="fc-day-number">6</span></td><td class="fc-day-top fc-fri fc-past" data-date="2018-09-07"><span class="fc-day-number">7</span></td><td class="fc-day-top fc-sat fc-past" data-date="2018-09-08"><span class="fc-day-number">8</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style="height: 107px;"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-past" data-date="2018-09-09"></td><td class="fc-day fc-widget-content fc-mon fc-past" data-date="2018-09-10"></td><td class="fc-day fc-widget-content fc-tue fc-past" data-date="2018-09-11"></td><td class="fc-day fc-widget-content fc-wed fc-past" data-date="2018-09-12"></td><td class="fc-day fc-widget-content fc-thu fc-past" data-date="2018-09-13"></td><td class="fc-day fc-widget-content fc-fri fc-past" data-date="2018-09-14"></td><td class="fc-day fc-widget-content fc-sat fc-past" data-date="2018-09-15"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-past" data-date="2018-09-09"><span class="fc-day-number">9</span></td><td class="fc-day-top fc-mon fc-past" data-date="2018-09-10"><span class="fc-day-number">10</span></td><td class="fc-day-top fc-tue fc-past" data-date="2018-09-11"><span class="fc-day-number">11</span></td><td class="fc-day-top fc-wed fc-past" data-date="2018-09-12"><span class="fc-day-number">12</span></td><td class="fc-day-top fc-thu fc-past" data-date="2018-09-13"><span class="fc-day-number">13</span></td><td class="fc-day-top fc-fri fc-past" data-date="2018-09-14"><span class="fc-day-number">14</span></td><td class="fc-day-top fc-sat fc-past" data-date="2018-09-15"><span class="fc-day-number">15</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style="height: 107px;"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-past" data-date="2018-09-16"></td><td class="fc-day fc-widget-content fc-mon fc-past" data-date="2018-09-17"></td><td class="fc-day fc-widget-content fc-tue fc-past" data-date="2018-09-18"></td><td class="fc-day fc-widget-content fc-wed fc-past" data-date="2018-09-19"></td><td class="fc-day fc-widget-content fc-thu fc-past" data-date="2018-09-20"></td><td class="fc-day fc-widget-content fc-fri fc-past" data-date="2018-09-21"></td><td class="fc-day fc-widget-content fc-sat fc-past" data-date="2018-09-22"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-past" data-date="2018-09-16"><span class="fc-day-number">16</span></td><td class="fc-day-top fc-mon fc-past" data-date="2018-09-17"><span class="fc-day-number">17</span></td><td class="fc-day-top fc-tue fc-past" data-date="2018-09-18"><span class="fc-day-number">18</span></td><td class="fc-day-top fc-wed fc-past" data-date="2018-09-19"><span class="fc-day-number">19</span></td><td class="fc-day-top fc-thu fc-past" data-date="2018-09-20"><span class="fc-day-number">20</span></td><td class="fc-day-top fc-fri fc-past" data-date="2018-09-21"><span class="fc-day-number">21</span></td><td class="fc-day-top fc-sat fc-past" data-date="2018-09-22"><span class="fc-day-number">22</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td class="fc-event-container" colspan="3"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" style="background-color:#f39c12;border-color:#f39c12"><div class="fc-content"><span class="fc-time">12a</span> <span class="fc-title">Long Event</span></div></a></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style="height: 107px;"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-past" data-date="2018-09-23"></td><td class="fc-day fc-widget-content fc-mon fc-today " data-date="2018-09-24"></td><td class="fc-day fc-widget-content fc-tue fc-future" data-date="2018-09-25"></td><td class="fc-day fc-widget-content fc-wed fc-future" data-date="2018-09-26"></td><td class="fc-day fc-widget-content fc-thu fc-future" data-date="2018-09-27"></td><td class="fc-day fc-widget-content fc-fri fc-future" data-date="2018-09-28"></td><td class="fc-day fc-widget-content fc-sat fc-future" data-date="2018-09-29"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-past" data-date="2018-09-23"><span class="fc-day-number">23</span></td><td class="fc-day-top fc-mon fc-today " data-date="2018-09-24"><span class="fc-day-number">24</span></td><td class="fc-day-top fc-tue fc-future" data-date="2018-09-25"><span class="fc-day-number">25</span></td><td class="fc-day-top fc-wed fc-future" data-date="2018-09-26"><span class="fc-day-number">26</span></td><td class="fc-day-top fc-thu fc-future" data-date="2018-09-27"><span class="fc-day-number">27</span></td><td class="fc-day-top fc-fri fc-future" data-date="2018-09-28"><span class="fc-day-number">28</span></td><td class="fc-day-top fc-sat fc-future" data-date="2018-09-29"><span class="fc-day-number">29</span></td></tr></thead><tbody><tr><td rowspan="2"></td><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" style="background-color:#0073b7;border-color:#0073b7"><div class="fc-content"><span class="fc-time">10:30a</span> <span class="fc-title">Meeting</span></div></a></td><td class="fc-event-container" rowspan="2"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" style="background-color:#00a65a;border-color:#00a65a"><div class="fc-content"><span class="fc-time">7p</span> <span class="fc-title">Birthday Party</span></div></a></td><td rowspan="2"></td><td rowspan="2"></td><td class="fc-event-container" rowspan="2"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" href="http://google.com/" style="background-color:#3c8dbc;border-color:#3c8dbc"><div class="fc-content"><span class="fc-time">12a</span> <span class="fc-title">Click for Google</span></div></a></td><td rowspan="2"></td></tr><tr><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" style="background-color:#00c0ef;border-color:#00c0ef"><div class="fc-content"><span class="fc-time">12p</span> <span class="fc-title">Lunch</span></div></a></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style="height: 109px;"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-future" data-date="2018-09-30"></td><td class="fc-day fc-widget-content fc-mon fc-other-month fc-future" data-date="2018-10-01"></td><td class="fc-day fc-widget-content fc-tue fc-other-month fc-future" data-date="2018-10-02"></td><td class="fc-day fc-widget-content fc-wed fc-other-month fc-future" data-date="2018-10-03"></td><td class="fc-day fc-widget-content fc-thu fc-other-month fc-future" data-date="2018-10-04"></td><td class="fc-day fc-widget-content fc-fri fc-other-month fc-future" data-date="2018-10-05"></td><td class="fc-day fc-widget-content fc-sat fc-other-month fc-future" data-date="2018-10-06"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-future" data-date="2018-09-30"><span class="fc-day-number">30</span></td><td class="fc-day-top fc-mon fc-other-month fc-future" data-date="2018-10-01"><span class="fc-day-number">1</span></td><td class="fc-day-top fc-tue fc-other-month fc-future" data-date="2018-10-02"><span class="fc-day-number">2</span></td><td class="fc-day-top fc-wed fc-other-month fc-future" data-date="2018-10-03"><span class="fc-day-number">3</span></td><td class="fc-day-top fc-thu fc-other-month fc-future" data-date="2018-10-04"><span class="fc-day-number">4</span></td><td class="fc-day-top fc-fri fc-other-month fc-future" data-date="2018-10-05"><span class="fc-day-number">5</span></td><td class="fc-day-top fc-sat fc-other-month fc-future" data-date="2018-10-06"><span class="fc-day-number">6</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div></div></div></td></tr></tbody></table></div></div></div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /. box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  <div><div class="row docs-premium-template">
                  <div class="col-sm-12 col-md-6">
              <div class="box box-solid">
                  <div class="box-body">
                      <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                          PREMIUM TEMPLATE
                      </h4>
                      <div class="media">
                          <div class="media-left">
                              <a href="https://themequarry.com/theme/materialpro-material-bootstrap-4-admin-template-ASC6FWYG" class="ad-click-event">
                                  <img src="/uploads/images/themequarry/material-pro.png" alt="MaterialPro" class="media-object" style="width: 150px;height: auto;border-radius: 4px;box-shadow: 0 1px 3px rgba(0,0,0,.15);">
                              </a>
                          </div>
                          <div class="media-body">
                              <div class="clearfix">
                                  <p class="pull-right">
                                      <a href="https://themequarry.com/theme/materialpro-material-bootstrap-4-admin-template-ASC6FWYG" class="btn btn-success btn-sm ad-click-event">
                                          LEARN MORE
                                      </a>
                                  </p>

                                  <h4 style="margin-top: 0">MaterialPro ??? $35</h4>

                                  <p>Material Bootstrap 4 Admin Template</p>
                                  <p style="margin-bottom: 0">
                                      <i class="fa fa-shopping-cart margin-r5"></i> 12+ purchases
                                  </p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
                  <div class="col-sm-12 col-md-6">
              <div class="box box-solid">
                  <div class="box-body">
                      <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                          PREMIUM TEMPLATE
                      </h4>
                      <div class="media">
                          <div class="media-left">
                              <a href="https://www.creative-tim.com/product/material-dashboard-pro-angular2?affiliate_id=97705" class="ad-click-event">
                                  <img src="/uploads/images/free_templates/creative-tim-material-angular.png" alt="Material Dashboard Pro" class="media-object" style="width: 150px;height: auto;border-radius: 4px;box-shadow: 0 1px 3px rgba(0,0,0,.15);">
                              </a>
                          </div>
                          <div class="media-body">
                              <div class="clearfix">
                                  <p class="pull-right">
                                      <a href="https://www.creative-tim.com/product/material-dashboard-pro-angular2?affiliate_id=97705" class="btn btn-success btn-sm ad-click-event">
                                          LEARN MORE
                                      </a>
                                  </p>

                                  <h4 style="margin-top: 0">Material Dashboard Pro ??? $59</h4>

                                  <p>Angular 2 Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design</p>
                                  <p style="margin-bottom: 0">
                                      <i class="fa fa-shopping-cart margin-r5"></i> 853+ purchases
                                  </p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          </div>
</div></section>

@stop