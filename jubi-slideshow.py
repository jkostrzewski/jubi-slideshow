from itertools import cycle

import Tkinter as tk

class App(tk.Tk):
    def __init__(self, image_files, x, y, delay):
        tk.Tk.__init__(self)
        self.geometry('+{}+{}'.format(x, y))
        self.delay = delay
        self.pictures = cycle((tk.PhotoImage(file=image, format='jpg'), image) for image in image_files)
        self.picture_display = tk.Label(self)
        self.picture_display.pack()

    def show_slides(self):
        img_object, img_name = next(self.pictures)
        self.picture_display.config(image=img_object)
        self.title(img_name)
        self.after(self.delay, self.show_slides)
    def run(self):
        self.mainloop()

delay = 3500
image_files = [
    'images/index.jpg',
]

x = 100
y = 50
app = App(image_files, x, y, delay)
app.show_slides()
app.run()
