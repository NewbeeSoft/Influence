{{-- <div class="page-header mt-0  p-3">
    <h3 class="mb-sm-0">{{$pageTitle}}</h3>
    <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="#"><i class="fe fe-home"></i></a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$pageTitle}}</li>
    </ol>
</div> --}}
<div class="page-header mt-0  p-3">
    <div class="card-body" style="padding: 0px;">
        <ul class="nav nav-tabs" id="myTab2" role="tablist">
            <li class="nav-item">
                <a class="nav-link active show" id="home-tab2" data-toggle="tab" href="#home2" role="tab" aria-selected="true">Influencer</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#profile2" role="tab" aria-selected="false">Content</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab2" data-toggle="tab" href="#contact2" role="tab" aria-selected="false">Audience</a>
            </li>
        </ul>
        <form>
        <div class="tab-content tab-bordered" id="myTab2Content">
            <form>
            <div class="tab-pane fade active show text-sm" id="home2" role="tabpanel" aria-labelledby="home-tab2">
                <div class="row">
                    <div class="col-md-3">
                        <h3>Location</h3>
                        <select id="location" name="location" class="form-control select2 w-100"  multiple="multiple"  data-placeholder="Select a location">
                        </select>
                    </div>
                    <div class="col-md-2">
                        <h3>Contacts</h3>
                        <select id="contact" name="contact" class="form-control select2 w-100" multiple="multiple" data-placeholder="Select a contac type">
                            <option>Have email</option>
                            <option>Have phone</option>
                            <option>Have social account</option>
                            <option>Have website</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <h3>Languages</h3>
                        <select id="language" name="language" class="form-control select2 w-100"  multiple="multiple"  data-placeholder="Select a language">
                            @foreach ($languageList as $lang)
                            @if($lang['alpha2'] !== null)
                            <option value="{{$lang['alpha2']}}">{{$lang['English']}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <h3>Key topics</h3>
                        <select id="keytopic" name="keytopic" class="form-control select2 w-100"  multiple="multiple"  data-placeholder="Select a key">
                        </select>
                    </div>
                    <div class="col-md-2">
                        <h3>Gender</h3>
                        <div class="custom-control custom-radio mb-3">
                            <input class="custom-control-input" id="genderAll" name="gender" type="radio" checked>
                            <label class="custom-control-label" for="genderAll">All</label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                            <input class="custom-control-input" id="genderMale" name="gender" type="radio">
                            <label class="custom-control-label" for="genderMale">Male</label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                            <input class="custom-control-input" id="genderFemale" name="gender" type="radio">
                            <label class="custom-control-label" for="genderFemale">Female</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade text-sm" id="profile2" role="tabpanel" aria-labelledby="profile-tab2">
                <div class="row">
                    <div class="col-md-2">
                        <h3>Posting frequency</h3>
                        <select id="frequency" name="frequency" class="form-control select2 w-100" multiple="multiple" data-placeholder="Select a contac type">
                            <option value="day">Every day</option>
                            <option value="week">Every week</option>
                            <option value="month">Every month</option>
                            <option value="3months">Every 3 months</option>
                            <option value="6months">Every 6 months</option>
                            <option value="year">Less frequently</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <h3>Engagements per post</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="engagement1" name="engagement1" type="number" class="form-control height-25px" name="example-text-input" placeholder="from">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="engagement2" name="engagement2" type="number" class="form-control height-25px" name="example-text-input" placeholder="to">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <h3>Views per video post</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="view1" name="view1" type="number" class="form-control height-25px" name="example-text-input" placeholder="from">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="view2" name="view2" type="number" class="form-control height-25px" name="example-text-input" placeholder="to">
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-2">
                        <h3>Contacts</h3>
                        <select id="contact" class="form-control select2 w-100" multiple="multiple" data-placeholder="Select a contac type">
                            <option>Have email</option>
                            <option>Have phone</option>
                            <option>Have social account</option>
                            <option>Have website</option>
                        </select>
                    </div> --}}
                </div>
            </div>
            <div class="tab-pane fade text-sm" id="contact2" role="tabpanel" aria-labelledby="contact-tab2">
                <div class="row">
                    <div class="col-md-3">
                        <h3>Audience size</h3>
                        <input type="text" id="a-size" name="a-size">
                        {{-- <select id="a-size" class="form-control select2 w-100"  multiple="multiple"  data-placeholder="Select a location">
                        </select> --}}
                    </div>
                    <div class="col-md-3">
                        <h3>Audience Location</h3>
                        <select id="a-location" name="a-location" class="form-control select2 w-100"  multiple="multiple"  data-placeholder="Select a location">
                        </select>
                    </div>
                    <div class="col-md-2">
                        <h3>Audience Gender</h3>
                        <div class="custom-control custom-radio mb-3">
                            <input class="custom-control-input" id="a-genderAll" name="a-gender" type="radio" checked>
                            <label class="custom-control-label" for="a-genderAll">All</label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                            <input class="custom-control-input" id="a-genderMale" name="a-gender" type="radio">
                            <label class="custom-control-label" for="a-genderMale">Male</label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                            <input class="custom-control-input" id="a-genderFemale" name="a-gender" type="radio">
                            <label class="custom-control-label" for="a-genderFemale">Female</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <h3>Audience interests
                        </h3>
                        <select id="a-interest" name="a-interest" class="form-control select2 w-100"  multiple="multiple"  data-placeholder="Select a key">
                        </select>
                    </div>
                    <div class="col-md-2">
                        <h3>Audience Languages</h3>
                        <select id="a-language" name="a-language" class="form-control select2 w-100"  multiple="multiple"  data-placeholder="Select a language">
                            @foreach ($languageList as $lang)
                            @if($lang['alpha2'] !== null)
                            <option value="{{$lang['alpha2']}}">{{$lang['English']}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>
