@extends('layouts.app')
@section('title', '系统设置 - '.config('system.name'))
@section('body')

  <!-- start navigation -->
  @include('layouts._nav')
  <!-- end navigation -->

  <!-- start site's main /content area -->
  <section class="content-wrap">
    <div class="container">
      <div id="profile" class="row">
        <!-- start main area -->
        <div class="col-3">
          <ul class="list-group text-center">
            <li class="list-group-item active">
              <a href="{{ route('setting.index')}}"><i class="fa fa-cog" aria-hidden="true"></i>
                系统设置</a>
            </li>
            <li class="list-group-item">
              <a href="{{ route('category.index') }}"><i class="fa fa-folder-open" aria-hidden="true"></i>
                分类管理</a>
            </li>
            <li class="list-group-item">
              <a href="{{ route('link.index') }}"><i class="fa fa-link" aria-hidden="true"></i>
                友链管理</a>
            </li>
          </ul>
        </div>
        <div class="col-9">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-cog" aria-hidden="true"></i> 系统设置
            </div>
            <div class="card-body">
              <!-- start message tips -->
            @include('layouts._msg')
            <!-- end message tips -->

              <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active" id="nav-basic-tab" data-toggle="tab" href="#nav-basic" role="tab"
                     aria-controls="nav-basic" aria-selected="true">基本设置</a>
                  <a class="nav-item nav-link" id="nav-mail-tab" data-toggle="tab" href="#nav-mail" role="tab"
                     aria-controls="nav-mail" aria-selected="false">邮件设置</a>
                  <a class="nav-item nav-link" id="nav-other-tab" data-toggle="tab" href="#nav-other" role="tab"
                     aria-controls="nav-other" aria-selected="false">其他设置</a>
                </div>
              </nav>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-basic" role="tabpanel" aria-labelledby="nav-basic-tab">
                  <form class="mt-2" method="post" action="{{ route('setting.update') }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="type" value="basic" />
                    <div class="form-group">
                      <label for="APP_URL">博客网址</label>
                      <input type="text" class="form-control" id="APP_URL" placeholder="博客网址"
                             name="APP_URL" value="{{ config('app.url') }}">
                    </div>
                    <div class="form-group">
                      <label for="SITE_NAME">博客名称</label>
                      <input type="text" class="form-control" id="SITE_NAME" placeholder="博客名称"
                             name="SITE_NAME" value="{{ config('system.name') }}">
                    </div>
                    <div class="form-group">
                      <label for="SITE_SLOGAN">博客标语</label>
                      <input type="text" class="form-control" id="SITE_SLOGAN" placeholder="博客标语"
                             name="SITE_SLOGAN" value="{{ config('system.slogan') }}">
                    </div>
                    <div class="form-group">
                      <label for="SITE_KEYWORD">博客关键词</label>
                      <input type="text" class="form-control" id="SITE_KEYWORD" placeholder="多个关键词以逗号分隔"
                             name="SITE_KEYWORD" value="{{ config('system.keyword') }}">
                    </div>
                    <div class="form-group">
                      <label for="SITE_DESCRIPTION">博客描述</label>
                      <textarea class="form-control" name="SITE_DESCRIPTION" id="SITE_DESCRIPTION"
                                rows="3" placeholder="不要超过150个字">{{ config('system.description') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">保存</button>
                  </form>
                </div>
                <div class="tab-pane fade" id="nav-mail" role="tabpanel" aria-labelledby="nav-mail-tab">
                  <form class="mt-2" method="post" action="{{ route('setting.update') }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="type" value="mail" />
                    <div class="form-group">
                      <label for="mail_drive">邮件驱动</label>
                      <select name="MAIL_DRIVER" class="form-control" id="mail_drive">
                        <option value="smtp" @if(config('mail.driver') == 'smtp') selected @endif>smtp</option>
                        <option value="sendmail" @if(config('mail.driver') == 'sendmail') selected @endif>sendmail</option>
                        <option value="mailgun" @if(config('mail.driver') == 'mailgun') selected @endif>mailgun</option>
                        <option value="mandrill" @if(config('mail.driver') == 'mandrill') selected @endif>mandrill</option>
                        <option value="ses" @if(config('mail.driver') == 'ses') selected @endif>ses</option>
                        <option value="sparkpost" @if(config('mail.driver') == 'sparkpost') selected @endif>sparkpost</option>
                        <option value="postmark" @if(config('mail.driver') == 'postmark') selected @endif>postmark</option>
                        <option value="log" @if(config('mail.driver') == 'log') selected @endif>log</option>
                        <option value="array" @if(config('mail.driver') == 'array') selected @endif>array</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="MAIL_FROM_ADDRESS">发信人邮箱</label>
                      <input type="text" class="form-control" id="MAIL_FROM_ADDRESS" placeholder="发信人邮箱地址"
                             name="MAIL_FROM_ADDRESS" value="{{ config('mail.from.address') }}">
                    </div>
                    <div class="form-group">
                      <label for="MAIL_FROM_NAME">发信人昵称</label>
                      <input type="text" class="form-control" id="MAIL_FROM_NAME" placeholder="发信人昵称"
                             name="MAIL_FROM_NAME" value="{{ config('mail.from.name') }}">
                    </div>
                    <div class="form-group">
                      <label for="MAIL_HOST">服务器地址</label>
                      <input type="text" class="form-control" id="MAIL_HOST" placeholder="邮件服务器地址"
                             name="MAIL_HOST" value="{{ config('mail.host') }}">
                    </div>
                    <div class="form-group">
                      <label for="MAIL_PORT">服务器端口</label>
                      <input type="text" class="form-control" id="MAIL_PORT" placeholder="服务器端口"
                             name="MAIL_PORT" value="{{ config('mail.port') }}">
                    </div>
                    <div class="form-group">
                      <label for="MAIL_USERNAME">用户名</label>
                      <input type="text" class="form-control" id="MAIL_USERNAME" placeholder="发信用户名"
                             name="MAIL_USERNAME" value="{{ config('mail.username') }}">
                    </div>
                    <div class="form-group">
                      <label for="MAIL_PASSWORD">密码</label>
                      <input type="text" class="form-control" id="MAIL_PASSWORD" placeholder="发信密码"
                             name="MAIL_PASSWORD" value="{{ config('mail.password') }}">
                    </div>
                    <div class="form-group">
                      <label for="MAIL_ENCRYPTION">加密协议</label>
                      <select name="MAIL_ENCRYPTION" class="form-control" id="MAIL_ENCRYPTION">
                        <option value="null"  @if(config('mail.encryption') == 'null') selected @endif>不加密</option>
                        <option value="tls"  @if(config('mail.encryption') == 'tls') selected @endif>tls</option>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary">保存</button>
                  </form>
                </div>
                <div class="tab-pane fade" id="nav-other" role="tabpanel" aria-labelledby="nav-other-tab">
                  <form class="mt-2" method="post" action="{{ route('setting.update') }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="type" value="other" />
                    <div class="form-group">
                      <label for="REDIS_HOST">Redis服务器地址</label>
                      <input type="text" class="form-control" id="REDIS_HOST" placeholder="Redis服务器地址"
                             name="REDIS_HOST" value="{{ config('database.redis.default.host') }}">
                    </div>
                    <div class="form-group">
                      <label for="REDIS_PASSWORD">Redis密码</label>
                      <input type="text" class="form-control" id="REDIS_PASSWORD" placeholder="无密码请留空"
                             name="REDIS_PASSWORD" value="{{ config('database.redis.default.password') }}">
                    </div>
                    <div class="form-group">
                      <label for="REDIS_PORT">Redis端口</label>
                      <input type="text" class="form-control" id="REDIS_PORT" placeholder="Redis端口"
                             name="REDIS_PORT" value="{{ config('database.redis.default.port') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">保存</button>
                  </form>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- end main area -->
      </div>
    </div>
  </section>
  <!-- end site's main /content area -->

  <!-- start main-footer -->
  @include('layouts._footer')
  <!-- end main-footer -->

@endsection