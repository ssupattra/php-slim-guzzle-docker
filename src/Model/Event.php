<?php
namespace Pearler\Model;

class Event extends Base
{
    public $title;
    public $description;
    public $location;
    public $date_submitted;
    public $date;
    public $published = false;


    public function getList($params)
    {
        $list = [];
        $client = $this->c['client'];
        if ($client) {
            $res = $client->request('GET', 'http://spring-mysql-docker.us-east-1.elasticbeanstalk.com/api/events');
            $res_array = json_decode($res->getBody());
            if (count($res_array)) {
                foreach ($res_array as $res_obj) {
                    $m = new Event($this->c);
                    $m->title = $res_obj->title;
                    $m->description = $res_obj->body;
                    $list[] = $m;
                }
            }

        }


//        $m = new Event();
//        $m->title = "Free Yoga Classes";
//        $m->description = "This class is for anyone who wants to build a deeper connection with their body, release emotional & physical tension and move in a healing way.";
//        $list[] = $m;
//
//        $m = new Event();
//        $m->title = "Friday Night Warriors 3.0+";
//        $m->description = "Just starting to play tennis? Recently moved here? Or been playing on USTA teams but want to meet fresh, new competitors? We offer events for all levels of players and we encourage our members to have fun and improve their games with Positive People.";
//        $list[] = $m;
//
//        $m = new Event();
//        $m->title = "Seniors' Group Dinner";
//        $m->description = "The Santa Anita Mall Food Court offers a variety of food options with the hustle and bustle of shoppers and visitors from all around Arcadia and surrounding areas.";
//        $list[] = $m;
//        $m = new Event();
//        $m->title = "Food for the Homeless";
//        $m->description = "Five nights a week, they give out vegetarian burritos and water to people at different locations.";
//        $list[] = $m;
//        $m = new Event();
//        $m->title = "Young Meditators of LA (20's - 30's)";
//        $m->description = "This group is for anyone in their 20s and 30s who is interested in learning and experiencing the benefits of meditation and socializing other like-minded individuals.";
//        $list[] = $m;
//        $m = new Event();
//        $m->title = "Meditation and Modern Buddhism in Hollywood ";
//        $m->description = "Our community is dedicated to bringing peace and happiness to the world, and to removing suffering. Through listening to modern presentations of Buddhist teachings and enjoying guided meditations, you can find the inner peace and happiness you seek, solve your daily problems, and gain greater power to help others.";
//        $list[] = $m;
//        $m = new Event();
//        $m->title = "LA Cannabis Events, Yoga, Circles and Meditations";
//        $m->description = "Cannabis and hemp, CBD, and plant medicine exploration, including but not limited to yoga and meditations, circles, monthly workshops, events and classes";
//        $list[] = $m;
        return $list;
    }
}