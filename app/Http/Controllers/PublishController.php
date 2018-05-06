<?php

namespace App\Http\Controllers;

use App\Http\ApiController;
use Illuminate\Http\Request;

use DateTime;
use Storage;
use Config;
use Auth;
use Illuminate\Database\Eloquent\Model;
use App\Models\Notice;
use App\Models\Advertisement;
use App\Models\Event;
use App\Models\Alert;
use App\Models\Publish;
use App\Http\Resources\PublishCollection;
use App\Http\Resources\Publish as PublishResource;

class PublishController extends ApiController
{
  public function getPublishes()
  {
    $publishes = Publish::all();
    $publishResource = new PublishCollection($publihes);

    return $publishResource;
  }

  public function addPublish($type, $id)
  {
    switch (strtolower($type)) {
      case 'notice':
        $response = $this->addPublishNotice($id);
        break;
      case 'advertisement':
        $response = $this->addPublishAdvertisement($id);
        break;
      case 'event':
        $response = $this->addPublishEvent($id);
        break;
      case 'alert':
        $response = $this->addPublishAlert($id);
        break;
      default:
        $response = redirect()->route('error');
    }

    return $response;
  }

  public function addPublishNotice($id)
  {
    $elem = Notice::find($id);

    return $this->addPublishElem($elem);;
  }

  public function addPublishAdvertisement($id)
  {
    $elem = Advertisement::find($id);

    return $this->addPublishElem($elem);;
  }

  public function addPublishEvent($id)
  {
    $elem = Event::find($id);

    return $this->addPublishElem($elem);;
  }

  public function addPublishAlert($id)
  {
    $elem = Alert::find($id);

    return $this->addPublishElem($elem);
  }

  private function addPublishElem(Model $elem)
  {
    $datetime = (new DateTime())->format('Y-m-d H:i:s');

    $attributes = array(
      'scheduled'    => $datetime,
      'duration'    => 10,
    );

    $publish = new Publish;
    $publish->fill($attributes);
    $elem->publishes()->save($publish);

    return new PublishResource($publish);
  }
}
