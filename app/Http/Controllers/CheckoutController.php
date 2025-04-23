<!-- 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CheckoutController extends Controller
{
    protected $apiBaseUrl = 'http://petly.test:8080/api/customer/cart/';
    
    /**
     * Show the checkout page
     */
    public function index(Request $request)
    {
        $token = '1|CowEGhhk7E2Rfat334Rz1MeSl75J6FKbYw3I2ve9c9c7db8e';
        
        // Get cart IDs from query parameter
        $cartIds = explode(',', $request->query('cart', ''));
        
        if (empty($cartIds)) {
            return redirect()->route('cart.index')->with('error', 'No items selected for checkout');
        }
        
        // Fetch cart data for selected items
        $response = Http::withToken($token)->get($this->apiBaseUrl);
        $allCartItems = $response->json()['data'] ?? [];
        
        // Filter cart items by selected IDs
        $selectedItems = array_filter($allCartItems, function($item) use ($cartIds) {
            return in_array($item['cart_id'], $cartIds);
        });
        
        // Calculate totals
        $subtotal = array_sum(array_column($selectedItems, 'total_price'));
        $taxAmount = 25000; // Fixed tax amount
        $total = $subtotal + $taxAmount;
        
        return view('checkout', [
            'selectedItems' => $selectedItems,
            'subtotal' => $subtotal,
            'taxAmount' => $taxAmount,
            'total' => $total,
            'cartIds' => $cartIds,
        ]);
    }
    
    /**
     * Process the checkout
     */
    public function process(Request $request)
    {
        // Here you would implement the checkout logic
        // This might include:
        // 1. Creating an order
        // 2. Processing payment
        // 3. Clearing selected items from cart
        
        // For now, let's just redirect with a success message
        return redirect()->route('order.confirmation')->with('success', 'Order placed successfully');
    }
} -->