<?php
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Exception;
use GuzzleHttp\Client as GuzzleHttpClient;
use Spatie\FlareClient\Http\Client as HttpClient;
use Twilio\Rest\Client;
  
class UserOtp extends Model
{
    use HasFactory;
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = ['user_id', 'otp', 'expire_at'];
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function sendSMS($receiverNumber)
    {
        $message = "Login OTP is ".$this->otp;
    
        try {
  
            $sid = 'AC377c80bdf162606a0593e506ba268f85';
            $token = 'aaa27db04bc6ce2407212ef704565c83';
            $twilio_number ='+14057846309';
  
            $client = new Client($sid, $token);
            $client->messages->create(
                '+84865702596',
                [
                'from' => $twilio_number, 
                'body' => $message]);
   
            info('SMS Sent Successfully.');
    
        } catch (Exception $e) {
            info("Error: ". $e->getMessage());
        }
    }
}