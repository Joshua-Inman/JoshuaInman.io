// Initialize canvas.
var canvas = document.getElementById("canvas");
var context = canvas.getContext("2d");
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

// Array of colors.
var myColors = [
  "#012D41",
  "#1BA5B8",
  "#DAECF3",
  "#FF404E",
  "#1CA5B8"
];

// Object for storing mouse position.
var mouse = {
  x: undefined,
  y: undefined
};

// Event listener for mouse position.
canvas.addEventListener("mousemove", function() {
  mouse.x = event.x;
  mouse.y = event.y;
});

var maxRadius = 50;
var minRadius = 10;

// Object constructor to create multiple circles.
function Circle(x, y, vx, vy, radius, color) {
  this.x = x;
  this.y = y;
  this.vx = vx;
  this.vy = vy;
  this.radius = radius;
  this.color = color;

  // Drawing circle.
  this.draw = function() {
    context.beginPath();
    context.arc(this.x, this.y, this.radius, 0, 2 * Math.PI, false);
    context.fillStyle = this.color;
    context.fill();
  }
  
  // Updating circle.
  this.update = function() {
    this.draw();
    
    // Adding velocity to circle.
    if (this.x + this.radius > innerWidth || this.x - this.radius < 0) {
      this.vx = -this.vx;
    }
    if (this.y + this.radius > innerHeight || this.y - this.radius < 0) {
      this.vy = -this.vy;
    }
    
    this.x += this.vx;
    this.y += this.vy;
    
    // Adding interactivity to circle.
    if (mouse.x - this.x < 150 && mouse.x - this.x > -150 && mouse.y - this.y < 150 && mouse.y - this.y > -150) {
      if (this.radius < maxRadius) {
        this.radius += 1;
      }
    } else if (this.radius > minRadius) {
      this.radius -= 1;
    }
  }
}

// Empty array for storing multiple circles.
var myCircles = [];

// For loop to generate multiple circles.
for (var i = 0; i < 100; i++) {
  var radius = 10;
  var color = myColors[Math.floor(Math.random() * 5)];
  var x = Math.random() * (innerWidth - radius * 2) + radius;
  var y = Math.random() * (innerHeight - radius * 2) + radius;
  var vx = (Math.random() - 0.5) * 2;
  var vy = (Math.random() - 0.5) * 2;
  myCircles.push(new Circle(x, y, vx, vy, radius, color));
}

function animate() {
  // Infinite loop refreshing and clearing canvas.
  requestAnimationFrame(animate);
  context.clearRect(0, 0, innerWidth, innerHeight);

  // Looping through array and updating each item.
  for (var i = 0; i < myCircles.length; i++) {
    myCircles[i].update();
  }
  
  // Drawing logo in center of canvas.
  if (innerWidth >= 1243) {
    context.font = "200px Pacifico";
    context.fillStyle = "#303030";
    context.textAlign = "center";
    context.fillText("JoshuaInman.io", canvas.width/2, canvas.height/2);
  }
  
  if (innerWidth <= 1242) {
    context.font = "130px Pacifico";
    context.fillStyle = "#303030";
    context.textAlign = "center";
    context.fillText("JoshuaInman.io", canvas.width/2, canvas.height/2);
  }
}

animate();