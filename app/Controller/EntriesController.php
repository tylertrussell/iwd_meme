<?

/**
  Controller class for our "Entries" model which will hold all of the data for our meme.
 * */
class EntriesController extends AppController {

    //Import our components
    var $components = array('RequestHandler');

    /**
      Create (or edit, if $entry_id is non-zero) and save data for any given Entry.
      Entries must remain Entry.moderator_approved = 0 until a moderator has
      explicitly approved the entry.
     * */
    function create($entry_id = 0) {

        //If there is no data POST'd and there is an Entry ID given..
        if (empty($this->request->data)) {
            if ($entry_id)
            //Read the data of the given Entry ID to the form
                $this->request->data = $this->Entry->findById($entry_id);
        }

        //If there is POST data
        else {

            //Create the Entry and set the POST'd data on it
            $this->Entry->create();
            $this->request->data['Entry']['ip_address'] = $this->RequestHandler->getClientIp();
            $this->Entry->set($this->request->data);

            //If Entry is valid
            if ($this->Entry->validates()) {

                //Save and Thank User, Redirect
                $this->Entry->save();
                $this->Session->setFlash('Thank you for your submission! It is pending moderator approval.');
                $this->redirect('/');
            }
            //If Entry is invalid
            else {
                //Error Msg
                $this->Session->setFlash('We could not accept your submission. Please try again.');
            }
        }
    }

    function delete($entry_id) {
        $this->Entry->delete($entry_id);
    }

    function load($mode = 'next', $entry_id = 0) {
        $this->autoRender = false;
        $e = $this->Entry->find('neighbors', array(
            'field' => 'id',
            'value' => $entry_id
                )
        );

        if (isset($e[$mode])) {
            $e = $e[$mode];
            echo json_encode(array('id' => $e['Entry']['id'], 'text' => $e['Entry']['text']));
        } else {
            $e = $this->Entry->find('first');
            echo json_encode(array('id' => $e['Entry']['id'], 'text' => $e['Entry']['text']));
        }
    }

    function json_index() {
        $this->autoRender = false;
        $e = $this->Entry->find('all');
        
        $final_arr = array();
        
        foreach($e as $i) {
            $final_arr[] = array(
                'id' => $i['Entry']['id'],
                'text' => $i['Entry']['text']
            );
        };
        echo json_encode($final_arr);
    }
    
    function alternate_view() {
        $this->layout = 'ajax';
        $e = $this->Entry->find('all');
        $this->set('entries', $e);
    }

    function entry($id) {
        $e = $this->Entry->findById($id);
        $this->set('entry', $e);
    }

}