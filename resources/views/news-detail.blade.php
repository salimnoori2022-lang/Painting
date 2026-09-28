<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{$post->title}}</title>
   
 <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}">
  <link rel="stylesheet" href="{{asset('assets/css/news-detail.css')}}">
</head>
<body>
   
 @if(strtolower($post->title)==='interior painting')
  <main class="news-detail-page">
    <div class="container content-grid">

      <article class="article-card">
        <div class="crumbs">
         <span><a href="{{ route('index') }}">Home</a></span>
          <span>/</span>
        
          <span>Interior Painting</span>
        </div>

        <span class="tag">Interior Painting</span>

        <h1>Interior Painting That Brings Light, Style, and Value to Every Room</h1>

        <div class="meta-row">
          <span>By VictoriaElite Painting Studio</span>
          <span>October 12, 2026</span>
          <span>5 min read</span>
        </div>

        <p class="lead">
          Interior painting is one of the easiest and most effective ways to transform the feel of a room.
          A well-executed paint job can brighten a space, improve mood, and raise the overall value of your home.
        </p>

        <div class="article-body">
          <p>
            Whether you are preparing to sell, renovating a property, or simply ready for a change, repainting
            your interior can completely redefine the look and atmosphere of your living spaces. Different shades,
            finishes, and application techniques can change how natural light moves through a room and how open
            or inviting the area feels.
          </p>

          <div class="feature-image">
            <img src="{{ asset('images/' . $post->imagename) }}" alt="Interior painting project">
          </div>

          <h3>Why interior painting creates instant impact</h3>

          <p>
            A fresh coat of paint does more than cover old walls. It provides an opportunity to update the style
            of your home, reduce signs of wear, and create a cleaner, more modern atmosphere. With carefully selected
            tones, a room can look brighter, larger, and more polished without needing a full renovation.
          </p>

          <ul>
            <li>Improves the visual appeal of every room</li>
            <li>Helps hide scuffs, stains, and minor surface damage</li>
            <li>Creates a cleaner, more welcoming environment</li>
            <li>Enhances the perceived value of your property</li>
          </ul>

          <div class="quote-box">
            “The right paint colour and finish can completely change how a room feels — brighter, calm, warmer,
            and more welcoming for everyday living.”
          </div>

          <h3>Choosing the right finish for each space</h3>

          <p>
            Different rooms need different finishes. Satin or eggshell works beautifully in family rooms and bedrooms,
            while semi-gloss is ideal for kitchens, hallways, and trim where durability matters. Kitchens and bathrooms
            often benefit from finishes that are easy to wipe down and resistant to moisture.
          </p>

          <p>
            Our team helps homeowners balance durability, maintenance, and aesthetic goals so the final result looks
            beautiful and lasts for years. Whether you want a classic neutral palette or a bolder feature wall, a
            professional approach ensures the finish is consistent and long-lasting.
          </p>

          <h3>Preparation matters as much as colour</h3>

          <p>
            A good interior paint job starts well before the first coat is applied. Proper preparation includes cleaning,
            patching cracks, sanding surfaces, protecting flooring and trim, and using the right primer. This ensures
            a smooth finish and improves paint adhesion over time.
          </p>

          <p>
            Investing in professional painting results in a cleaner finish, fewer touch-ups, and a more polished final
            look. It also saves time and reduces stress for homeowners who want a hassle-free transformation.
          </p>
        </div>

        <section class="comments-section" id="comments">
    <div class="comments-header">
        <h3>
            <i class="bi bi-chat-left-text-fill"></i>
            Comments
        </h3>

        <span>
            {{ $post->comments->count() }}
            {{ $post->comments->count() === 1 ? 'Comment' : 'Comments' }}
        </span>
    </div>

    <!-- Existing Comments -->
    <div class="comments-list">
        @forelse($post->comments as $comment)
            <div class="comment-item">
                <div class="comment-avatar">
                    {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                </div>

                <div class="comment-body">
                    <div class="comment-meta">
                        <strong>{{ $comment->user->name }}</strong>

                        <span>
                            {{ $comment->created_at->diffForHumans() }}
                        </span>
                    </div>

                    <p>{{ $comment->body }}</p>
                </div>
                  @auth
            @if(auth()->id() === $comment->user_id || auth()->user()->type === 'Admin')
                <form action="{{ route('comments.destroy', $comment->id) }}"
                      method="POST"
                      style="display: inline;"
                      onsubmit="return confirm('Are you sure you want to delete this comment?');">

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="bi bi-trash"></i>
                        Delete
                    </button>
                </form>
            @endif
        @endauth
            </div>
        @empty
            <div class="empty-comments">
                <i class="bi bi-chat-square-text"></i>
                <p>
                    No comments yet. Be the first to join the discussion!
                </p>
            </div>
        @endforelse
    </div>

    <!-- Comment Form -->
    <div class="comment-form">
        <h4>Leave a Comment</h4>

        @auth
            <form action="{{ route('comments.store', $post->id) }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="body">Your comment</label>

                    <textarea
                        id="body"
                        name="body"
                        rows="5"
                        placeholder="Write your comment here..."
                        required
                    >{{ old('body') }}</textarea>

                    @error('body')
                        <small class="form-error">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="comment-submit">
                    <i class="bi bi-send-fill"></i>
                    Submit Comment
                </button>
            </form>
        @else
            <div class="login-message">
                <i class="bi bi-lock-fill"></i>

                <p>
                    You must be logged in to post a comment.
                </p>

                <a href="{{ route('login') }}" class="login-button">
                    Login Now
                </a>
            </div>
        @endauth
    </div>
</section>
      </article>

      <aside class="sidebar">
        <div class="card">
          <h3>Related Articles</h3>

          <div class="mini-list">
            <a href="#" class="mini-item">
              <img src="{{ asset('assets/images/salim.jpg') }}" alt="Choosing paint finish">
              <div>
                <h4>Choosing the Right Paint Finish for High-Traffic Areas</h4>
                <span>Read article</span>
              </div>
            </a>

            <a href="#" class="mini-item">
              <img src="{{ asset('assets/images/salim.jpg') }}" alt="Increase home value">
              <div>
                <h4>How a Fresh Coat of Paint Can Increase Home Value</h4>
                <span>Read article</span>
              </div>
            </a>

            <a href="#" class="mini-item">
              <img src="{{ asset('assets/images/salim.jpg') }}" alt="Modern color trends">
              <div>
                <h4>Top Interior Colour Trends for a Modern Home</h4>
                <span>Read article</span>
              </div>
            </a>
          </div>
        </div>

        <div class="cta-box">
          <h3>Ready to refresh your space?</h3>
          <p>Book a free consultation and let us help you choose the perfect colours and finish for your home.</p>
          <a href="#" class="cta-btn">Request a Quote</a>
        </div>
      </aside>

    </div>
  </main>
@elseif(strtolower($post->title)==='exterior painting')

<main class="news-detail-page">
    <div class="container content-grid">

        <article class="article-card">

            <div class="crumbs">
               <span><a href="{{ route('index') }}">Home</a></span>
               
                <span>/</span>
                <span>Exterior Painting</span>
            </div>

            <span class="tag">Exterior Painting</span>

            <h1>
                Exterior Painting That Protects and Transforms Your Home
            </h1>

            <div class="meta-row">
                <span>By VictoriaElite Painting</span>
                <span>October 12, 2026</span>
                <span>6 min read</span>
            </div>

            <p class="lead">
                A professionally painted exterior can dramatically improve your home's appearance,
                protect it from harsh weather, and increase its long-term value.
            </p>

            <div class="article-body">

                <p>
                    Exterior painting is one of the most effective ways to refresh your property and
                    protect it from the elements. A high-quality exterior paint job helps defend your
                    walls, doors, windows, and trim from sunlight, moisture, wind, and changing temperatures.
                </p>

                <div class="feature-image">
                    <img
                        src="{{ asset('images/' . $post->imagename) }}"
                        alt="Beautiful home with freshly painted exterior"
                    >
                </div>

                <h3>
                    Why exterior painting is important
                </h3>

                <p>
                    Your home's exterior is constantly exposed to weather conditions. Over time, paint
                    can fade, crack, peel, or become damaged. Regular exterior painting helps prevent
                    small problems from becoming expensive repairs.
                </p>

                <ul>
                    <li>Protects exterior surfaces from moisture and weather damage</li>
                    <li>Improves the appearance and curb appeal of your home</li>
                    <li>Helps prevent peeling, cracking, and wood deterioration</li>
                    <li>Increases the overall value of your property</li>
                    <li>Creates a cleaner and more modern appearance</li>
                </ul>

                <div class="quote-box">
                    “A beautiful exterior does more than improve curb appeal — it protects your home
                    and gives it a finish that lasts for years.”
                </div>

                <h3>
                    Choosing the right exterior paint
                </h3>

                <p>
                    Choosing the right exterior paint depends on your home's surface, location,
                    weather conditions, and architectural style. High-quality exterior paints are
                    designed to resist fading, moisture, mildew, and temperature changes.
                </p>

                <p>
                    At VictoriaElite Painting, we help homeowners choose colours and finishes that
                    complement their property while providing long-lasting protection. From neutral
                    tones to bold modern colours, the right combination can completely transform your
                    home's exterior.
                </p>

                <h3>
                    Proper preparation creates better results
                </h3>

                <p>
                    Preparation is one of the most important parts of any exterior painting project.
                    Before painting begins, surfaces should be cleaned, scraped, repaired, sanded,
                    and primed where necessary.
                </p>

                <p>
                    Our professional team takes the time to prepare every surface properly. This
                    ensures that the paint adheres correctly, looks smooth, and provides reliable
                    protection for many years.
                </p>

                <h3>
                    Professional exterior painting by VictoriaElite Painting
                </h3>

                <p>
                    Whether you need to repaint your entire home, refresh your trim, or update your
                    front door, VictoriaElite Painting delivers dependable exterior painting services
                    with attention to detail and quality workmanship.
                </p>

                <p>
                    We combine premium materials, careful preparation, and professional application
                    techniques to create a clean, durable, and attractive finish for every property.
                </p>

            </div>

            <!-- Comments Section -->
            <section class="comments-section">

                <div class="comments-header">
                    <h3>
                        <i class="bi bi-chat-left-text-fill"></i>
                        Comments
                    </h3>

                    <span>
                        {{ $post->comments->count() }}
                        {{ $post->comments->count() === 1 ? 'Comment' : 'Comments' }}
                    </span>
                </div>

                <!-- Existing Comments -->
                <div class="comments-list">

                    @forelse($post->comments as $comment)

                        <div class="comment-item">

                            <div class="comment-avatar">
                                {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                            </div>

                            <div class="comment-body">

                                <div class="comment-meta">
                                    <strong>
                                        {{ $comment->user->name }}
                                    </strong>

                                    <span>
                                        {{ $comment->created_at->diffForHumans() }}
                                    </span>
                                </div>

                                <p>
                                    {{ $comment->body }}
                                </p>

                            </div>
    @auth
            @if(auth()->id() === $comment->user_id || auth()->user()->type === 'Admin')
                <form action="{{ route('comments.destroy', $comment->id) }}"
                      method="POST"
                      style="display: inline;"
                      onsubmit="return confirm('Are you sure you want to delete this comment?');">

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="bi bi-trash"></i>
                        Delete
                    </button>
                </form>
            @endif
        @endauth
                        </div>

                    @empty

                        <div class="empty-comments">
                            <i class="bi bi-chat-square-text"></i>

                            <p>
                                No comments yet. Be the first to join the discussion!
                            </p>
                        </div>

                    @endforelse

                </div>

                <!-- Comment Form -->
                <div class="comment-form">

                    <h4>Leave a Comment</h4>

                    @auth

                        <form
                            action="{{ route('comments.store', $post->id) }}"
                            method="POST"
                        >
                            @csrf

                            <div class="form-group">
                                <label for="body">
                                    Your comment
                                </label>

                                <textarea
                                    id="body"
                                    name="body"
                                    rows="5"
                                    placeholder="Write your comment here..."
                                    required
                                >{{ old('body') }}</textarea>

                                @error('body')
                                    <small class="form-error">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <button type="submit" class="comment-submit">
                                <i class="bi bi-send-fill"></i>
                                Submit Comment
                            </button>
                        </form>

                    @else

                        <div class="login-message">
                            <i class="bi bi-lock-fill"></i>

                            <p>
                                You must be logged in to post a comment.
                            </p>

                            <a
                                href="{{ route('login') }}"
                                class="login-button"
                            >
                                Login Now
                            </a>
                        </div>

                    @endauth

                </div>

            </section>

        </article>

        <aside class="sidebar">

            <div class="card">
                <h3>Related Articles</h3>

                <div class="mini-list">

                    <a href="#" class="mini-item">
                        <img
                            src="{{ asset('assets/images/salim.jpg') }}"
                            alt="Exterior paint colours"
                        >

                        <div>
                            <h4>
                                How to Choose the Perfect Exterior Paint Colour
                            </h4>

                            <span>Read article</span>
                        </div>
                    </a>

                    <a href="#" class="mini-item">
                        <img
                            src="{{ asset('assets/images/salim.jpg') }}"
                            alt="Home exterior painting"
                        >

                        <div>
                            <h4>
                                How Exterior Painting Increases Curb Appeal
                            </h4>

                            <span>Read article</span>
                        </div>
                    </a>

                    <a href="#" class="mini-item">
                        <img
                            src="{{ asset('assets/images/salim.jpg') }}"
                            alt="Modern painted house"
                        >

                        <div>
                            <h4>
                                Popular Exterior Colour Trends for Modern Homes
                            </h4>

                            <span>Read article</span>
                        </div>
                    </a>

                </div>
            </div>

            <div class="cta-box">
                <h3>
                    Ready to transform your exterior?
                </h3>

                <p>
                    Contact VictoriaElite Painting today for a professional exterior painting
                    consultation and a free project estimate.
                </p>

                <a href="#" class="cta-btn">
                    Request a Quote
                </a>
            </div>

        </aside>

    </div>
</main>
@elseif(strtolower($post->title)==='commercial painting')

<main class="news-detail-page">
    <div class="container content-grid">

        <article class="article-card">

            <div class="crumbs">
               <span><a href="{{ route('index') }}">Home</a></span>
                
                <span>/</span>
                <span>Commercial Painting</span>
            </div>

            <span class="tag">Commercial Painting</span>

            <h1>
                Commercial Painting That Creates a Professional Business Environment
            </h1>

            <div class="meta-row">
                <span>By VictoriaElite Painting</span>
                <span>October 12, 2026</span>
                <span>7 min read</span>
            </div>

            <p class="lead">
                A professionally painted commercial property can improve your brand image,
                create a welcoming environment, and protect your building for years to come.
            </p>

            <div class="article-body">

                <p>
                    Commercial painting is an important investment for businesses, offices, retail
                    spaces, restaurants, warehouses, and other professional properties. The right
                    colours and finishes can make your space more attractive, functional, and aligned
                    with your brand identity.
                </p>

                <div class="feature-image">
                    <img
                        src="{{ asset('images/' . $post->imagename) }}"
                        alt="Professionally painted commercial office"
                    >
                </div>

                <h3>
                    Why commercial painting matters
                </h3>

                <p>
                    Your commercial property is often the first experience customers and clients have
                    with your business. Clean, well-maintained walls and professional finishes create
                    a positive impression and show that your business values quality and attention to detail.
                </p>

                <ul>
                    <li>Creates a professional and welcoming business environment</li>
                    <li>Strengthens your company's visual identity</li>
                    <li>Improves customer and employee experience</li>
                    <li>Protects walls and surfaces from daily wear and damage</li>
                    <li>Increases the appearance and value of your property</li>
                </ul>

                <div class="quote-box">
                    “A well-painted commercial space does more than look professional — it helps
                    communicate your brand, values, and commitment to quality.”
                </div>

                <h3>
                    Painting solutions for every commercial space
                </h3>

                <p>
                    Every business has different painting needs. An office may require calm,
                    professional colours, while a retail store may benefit from bold shades that
                    attract attention. Restaurants, hotels, schools, medical facilities, and
                    warehouses also require specialised materials and finishes.
                </p>

                <p>
                    VictoriaElite Painting provides commercial painting solutions for a wide range
                    of properties, including offices, shops, restaurants, apartment buildings,
                    warehouses, schools, and healthcare facilities.
                </p>

                <h3>
                    Durable finishes for busy environments
                </h3>

                <p>
                    Commercial spaces experience constant activity, which means surfaces need to
                    withstand regular contact, cleaning, movement, and general wear. We use durable,
                    high-quality paints and finishes designed for busy environments.
                </p>

                <p>
                    Depending on your property's needs, we can recommend washable, moisture-resistant,
                    low-odour, and high-durability coatings. Our goal is to provide an attractive
                    finish that continues to perform long after the project is complete.
                </p>

                <h3>
                    Professional preparation and minimal disruption
                </h3>

                <p>
                    Proper preparation is essential for a successful commercial painting project.
                    Our team carefully prepares walls, ceilings, doors, trim, and other surfaces
                    before applying paint.
                </p>

                <p>
                    We understand that businesses need to continue operating during renovations.
                    VictoriaElite Painting works with your schedule to reduce disruption and complete
                    projects efficiently, safely, and professionally.
                </p>

                <h3>
                    Commercial painting by VictoriaElite Painting
                </h3>

                <p>
                    From a single office refresh to a complete commercial property renovation,
                    VictoriaElite Painting delivers reliable workmanship, quality materials, and
                    professional service from start to finish.
                </p>

                <p>
                    We help business owners choose the right colours, finishes, and painting solutions
                    to create a space that looks professional, reflects their brand, and stands up
                    to everyday use.
                </p>

            </div>

            <!-- Comments Section -->
            <section class="comments-section">

                <div class="comments-header">
                    <h3>
                        <i class="bi bi-chat-left-text-fill"></i>
                        Comments
                    </h3>

                    <span>
                        {{ $post->comments->count() }}
                        {{ $post->comments->count() === 1 ? 'Comment' : 'Comments' }}
                    </span>
                </div>

                <!-- Existing Comments -->
                <div class="comments-list">

                    @forelse($post->comments as $comment)

                        <div class="comment-item">

                            <div class="comment-avatar">
                                {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                            </div>

                            <div class="comment-body">

                                <div class="comment-meta">
                                    <strong>
                                        {{ $comment->user->name }}
                                    </strong>

                                    <span>
                                        {{ $comment->created_at->diffForHumans() }}
                                    </span>
                                </div>

                                <p>
                                    {{ $comment->body }}
                                </p>

                            </div>
                                @auth
            @if(auth()->id() === $comment->user_id || auth()->user()->type === 'Admin')
                <form action="{{ route('comments.destroy', $comment->id) }}"
                      method="POST"
                      style="display: inline;"
                      onsubmit="return confirm('Are you sure you want to delete this comment?');">

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="bi bi-trash"></i>
                        Delete
                    </button>
                </form>
            @endif
        @endauth

                        </div>

                    @empty

                        <div class="empty-comments">
                            <i class="bi bi-chat-square-text"></i>

                            <p>
                                No comments yet. Be the first to join the discussion!
                            </p>
                        </div>

                    @endforelse

                </div>

                <!-- Comment Form -->
                <div class="comment-form">

                    <h4>Leave a Comment</h4>

                    @auth

                        <form
                            action="{{ route('comments.store', $post->id) }}"
                            method="POST"
                        >
                            @csrf

                            <div class="form-group">
                                <label for="body">
                                    Your comment
                                </label>

                                <textarea
                                    id="body"
                                    name="body"
                                    rows="5"
                                    placeholder="Write your comment here..."
                                    required
                                >{{ old('body') }}</textarea>

                                @error('body')
                                    <small class="form-error">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <button type="submit" class="comment-submit">
                                <i class="bi bi-send-fill"></i>
                                Submit Comment
                            </button>
                        </form>

                    @else

                        <div class="login-message">
                            <i class="bi bi-lock-fill"></i>

                            <p>
                                You must be logged in to post a comment.
                            </p>

                            <a
                                href="{{ route('login') }}"
                                class="login-button"
                            >
                                Login Now
                            </a>
                        </div>

                    @endauth

                </div>

            </section>

        </article>

        <aside class="sidebar">

            <div class="card">
                <h3>Related Articles</h3>

                <div class="mini-list">

                    <a href="#" class="mini-item">
                        <img
                            src="{{ asset('assets/images/salim.jpg') }}"
                            alt="Modern commercial office"
                        >

                        <div>
                            <h4>
                                Choosing the Right Colours for Your Business
                            </h4>

                            <span>Read article</span>
                        </div>
                    </a>

                    <a href="#" class="mini-item">
                        <img
                            src="{{ asset('assets/images/salim.jpg') }}"
                            alt="Professional office interior"
                        >

                        <div>
                            <h4>
                                How a Fresh Paint Job Improves Your Workplace
                            </h4>

                            <span>Read article</span>
                        </div>
                    </a>

                    <a href="#" class="mini-item">
                        <img
                            src="{{ asset('assets/images/salim.jpg') }}"
                            alt="Commercial painting project"
                        >

                        <div>
                            <h4>
                                Durable Paint Finishes for Commercial Buildings
                            </h4>

                            <span>Read article</span>
                        </div>
                    </a>

                </div>
            </div>

            <div class="cta-box">
                <h3>
                    Ready to upgrade your business space?
                </h3>

                <p>
                    Contact VictoriaElite Painting today for a professional commercial painting
                    consultation and a free project estimate.
                </p>

                <a href="#" class="cta-btn">
                    Request a Quote
                </a>
            </div>

        </aside>

    </div>
</main>
@elseif(strtolower($post->title)==='roof painting')

<main class="news-detail-page">
    <div class="container content-grid">

        <article class="article-card">

            <div class="crumbs">
                <span><a href="{{ route('index') }}">Home</a></span>
               
                <span>/</span>
                <span>Roof Painting</span>
            </div>

            <span class="tag">Roof Painting</span>

            <h1>
                Roof Painting That Protects and Extends the Life of Your Roof
            </h1>

            <div class="meta-row">
                <span>By VictoriaElite Painting</span>
                <span>October 12, 2026</span>
                <span>6 min read</span>
            </div>

            <p class="lead">
                Professional roof painting can improve your property's appearance, protect your roof
                from harsh weather, and help extend its service life.
            </p>

            <div class="article-body">

                <p>
                    A roof is one of the most important parts of any property. It protects your home
                    or business from rain, sunlight, wind, and changing temperatures. Over time,
                    exposure to the elements can cause roof surfaces to fade, crack, deteriorate,
                    and lose their protective finish.
                </p>

                <div class="feature-image">
                    <img
                        src="{{ asset('images/' . $post->imagename) }}"
                        alt="House with a professionally painted roof"
                    >
                </div>

                <h3>
                    Why roof painting is important
                </h3>

                <p>
                    Roof painting is more than a cosmetic improvement. A high-quality roof coating
                    provides an additional layer of protection against moisture, UV rays, heat,
                    mould, mildew, and general weather damage.
                </p>

                <ul>
                    <li>Protects roofing materials from moisture and weather damage</li>
                    <li>Improves the appearance and value of your property</li>
                    <li>Helps reduce fading, cracking, and surface deterioration</li>
                    <li>Reflects heat and may improve energy efficiency</li>
                    <li>Extends the service life of your existing roof</li>
                </ul>

                <div class="quote-box">
                    “A professionally painted roof can make your property look newer while providing
                    an important layer of protection against the elements.”
                </div>

                <h3>
                    Choosing the right roof paint
                </h3>

                <p>
                    The best roof paint depends on the roofing material, roof condition, climate,
                    and type of property. Different surfaces, such as metal, concrete, tiles, and
                    corrugated roofing, require specific preparation methods and coating systems.
                </p>

                <p>
                    VictoriaElite Painting helps property owners choose durable roof coatings that
                    provide reliable protection and complement the overall appearance of the building.
                    We can recommend suitable colours and finishes for residential and commercial roofs.
                </p>

                <h3>
                    Proper roof preparation creates better results
                </h3>

                <p>
                    Preparation is one of the most important stages of a roof painting project.
                    Before painting begins, the roof should be inspected, cleaned, and repaired.
                    Dirt, moss, mould, loose paint, and damaged areas must be treated before the
                    coating is applied.
                </p>

                <p>
                    Our team carefully prepares each roof surface to ensure the paint adheres properly
                    and provides long-lasting protection. We also take steps to protect surrounding
                    walls, windows, landscaping, and outdoor areas during the project.
                </p>

                <h3>
                    Weather-resistant protection for your property
                </h3>

                <p>
                    A quality roof coating helps protect your property from intense sunlight, heavy
                    rain, strong winds, and temperature changes. It can also help reduce the effects
                    of UV exposure and prevent premature deterioration of roofing materials.
                </p>

                <p>
                    With the right coating and professional application, your roof can maintain its
                    appearance and performance for many years.
                </p>

                <h3>
                    Roof painting by VictoriaElite Painting
                </h3>

                <p>
                    Whether you need to restore a faded roof, update the colour of your property,
                    or protect an older roofing surface, VictoriaElite Painting provides professional
                    roof painting services with careful preparation and high-quality materials.
                </p>

                <p>
                    Our experienced team delivers clean, reliable, and durable results for homes,
                    offices, rental properties, and commercial buildings.
                </p>

            </div>

            <!-- Comments Section -->
            <section class="comments-section">

                <div class="comments-header">
                    <h3>
                        <i class="bi bi-chat-left-text-fill"></i>
                        Comments
                    </h3>

                    <span>
                        {{ $post->comments->count() }}
                        {{ $post->comments->count() === 1 ? 'Comment' : 'Comments' }}
                    </span>
                </div>

                <!-- Existing Comments -->
                <div class="comments-list">

                    @forelse($post->comments as $comment)

                        <div class="comment-item">

                            <div class="comment-avatar">
                                {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                            </div>

                            <div class="comment-body">

                                <div class="comment-meta">
                                    <strong>
                                        {{ $comment->user->name }}
                                    </strong>

                                    <span>
                                        {{ $comment->created_at->diffForHumans() }}
                                    </span>
                                </div>

                                <p>
                                    {{ $comment->body }}
                                </p>

                            </div>

                                @auth
            @if(auth()->id() === $comment->user_id || auth()->user()->type === 'Admin')
                <form action="{{ route('comments.destroy', $comment->id) }}"
                      method="POST"
                      style="display: inline;"
                      onsubmit="return confirm('Are you sure you want to delete this comment?');">

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="bi bi-trash"></i>
                        Delete
                    </button>
                </form>
            @endif
        @endauth
                        </div>

                    @empty

                        <div class="empty-comments">
                            <i class="bi bi-chat-square-text"></i>

                            <p>
                                No comments yet. Be the first to join the discussion!
                            </p>
                        </div>

                    @endforelse

                </div>

                <!-- Comment Form -->
                <div class="comment-form">

                    <h4>Leave a Comment</h4>

                    @auth

                        <form
                            action="{{ route('comments.store', $post->id) }}"
                            method="POST"
                        >
                            @csrf

                            <div class="form-group">
                                <label for="body">
                                    Your comment
                                </label>

                                <textarea
                                    id="body"
                                    name="body"
                                    rows="5"
                                    placeholder="Write your comment here..."
                                    required
                                >{{ old('body') }}</textarea>

                                @error('body')
                                    <small class="form-error">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <button type="submit" class="comment-submit">
                                <i class="bi bi-send-fill"></i>
                                Submit Comment
                            </button>
                        </form>

                    @else

                        <div class="login-message">
                            <i class="bi bi-lock-fill"></i>

                            <p>
                                You must be logged in to post a comment.
                            </p>

                            <a
                                href="{{ route('login') }}"
                                class="login-button"
                            >
                                Login Now
                            </a>
                        </div>

                    @endauth

                </div>

            </section>

        </article>

        <aside class="sidebar">

            <div class="card">
                <h3>Related Articles</h3>

                <div class="mini-list">

                    <a href="#" class="mini-item">
                        <img
                            src="{{ asset('assets/images/salim.jpg') }}"
                            alt="Roof painting colour"
                        >

                        <div>
                            <h4>
                                How to Choose the Right Roof Paint Colour
                            </h4>

                            <span>Read article</span>
                        </div>
                    </a>

                    <a href="#" class="mini-item">
                        <img
                            src="{{ asset('assets/images/salim.jpg') }}"
                            alt="Roof maintenance"
                        >

                        <div>
                            <h4>
                                Signs Your Roof May Need Professional Painting
                            </h4>

                            <span>Read article</span>
                        </div>
                    </a>

                    <a href="#" class="mini-item">
                        <img
                            src="{{ asset('assets/images/salim.jpg') }}"
                            alt="Roof protection"
                        >

                        <div>
                            <h4>
                                How Roof Coatings Help Protect Your Property
                            </h4>

                            <span>Read article</span>
                        </div>
                    </a>

                </div>
            </div>

            <div class="cta-box">
                <h3>
                    Ready to protect your roof?
                </h3>

                <p>
                    Contact VictoriaElite Painting today for a professional roof painting
                    consultation and a free project estimate.
                </p>

                <a href="#" class="cta-btn">
                    Request a Quote
                </a>
            </div>

        </aside>

    </div>
</main>
@endif
   
</body>
</html>

  



  









