import argparse
import random
import os
import pyglet
from time import sleep
import copy



def get_image_paths(input_dir='.'):
    global image_paths
    paths = []
    for root, dirs, files in os.walk(input_dir, topdown=True):
        for file in sorted(files):
            if file.endswith(('jpg', 'png', 'gif')):
                path = os.path.abspath(os.path.join(root, file))
                paths.append(path)
    image_paths = paths


def update_image(dt):
    global slide_time, curr_slide_time, do_fade, sprite_old, sprite_new
    curr_slide_time += dt
    print curr_slide_time, do_fade
    if curr_slide_time >= slide_time:
        do_fade = True
    if do_fade:
        sprite_old.opacity -= 10
        if sprite_old.opacity <= 0:
            do_fade = False
            sprite_old = sprite_new
            sprite_new = get_sprite()
            curr_slide_time = 0
    window.clear()

def get_scale(window, image):
    if image.width > image.height:
        scale = float(window.width) / image.width
    else:
        scale = float(window.height) / image.height
    return scale




def get_sprite():
    img = pyglet.image.load(random.choice(image_paths))
    sprite = pyglet.sprite.Sprite(img)
    sprite.scale = get_scale(window, img)
    sprite.x = 0
    sprite.y = 0
    sprite.opacity = 255
    return sprite

window = pyglet.window.Window(fullscreen=True)
@window.event
def on_draw():    
    sprite_new.draw()
    sprite_old.draw()
    

if __name__ == '__main__':
    
    image_paths = []
    slide_time = 3
    curr_slide_time = 0
    fade_time = 1000
    do_fade = False
    
    parser = argparse.ArgumentParser()
    parser.add_argument('dir', help='directory of images',
                        nargs='?', default=os.getcwd())
    args = parser.parse_args()
    get_image_paths()

    sprite_old = get_sprite()
    sprite_new = get_sprite()
    
    pyglet.clock.schedule_interval(update_image, 1/10.0)

    pyglet.app.run()
